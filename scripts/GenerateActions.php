<?php

class GenerateActions {

    protected const DOLLAR = '$';
    protected const ASTERISK = '*';
    protected const SPACE = ' ';
    protected const SPACE3 = '   ';
    protected const QUOTE = '\'';
    protected const BACKSLASH = '\\';
    protected const SLASH = '/';
    protected const DOT = '.';
    protected const DASH = '-';
    protected const COLON = ':';
    protected const UNDERSCORE = '_';
    protected const COMMA = ',';

    protected const TAB_SIZE = 4;
    protected const CONNECTION_TIMEOUT = 10;
    protected const LINE_LENGTH_PARAMETER = 108;
    protected const LINE_LENGTH_DESCRIPTION = 112;

    protected const COMMENT_START = '/**';
    protected const COMMENT_END = '*/';

    protected const KEYWORD_METHODS = 'methods';
    protected const KEYWORD_USE = 'use';
    protected const KEYWORD_NEW = 'new ';
    protected const KEYWORD_STATIC = 'static::';
    protected const KEYWORD_THIS = 'this->';
    protected const KEYWORD_RETURN = 'return ';
    protected const KEYWORD_ACTIONS = 'Actions';
    protected const KEYWORD_ENUMS = 'Enums';
    protected const KEYWORD_CLIENT = 'Client';
    protected const VK_NAMESPACE = 'VK';
    protected const VK_ACTIONS = self::VK_NAMESPACE . self::BACKSLASH . self::KEYWORD_ACTIONS;
    protected const VK_ENUMS = self::VK_ACTIONS . self::BACKSLASH. self::KEYWORD_ENUMS;
    protected const VK_CLIENT = self::VK_NAMESPACE . self::BACKSLASH. self::KEYWORD_CLIENT;
    protected const VK_LANGUAGE = 'VKLanguage';
    protected const VK_API_REQUEST_VAR_NAME = 'request';
    protected const VK_API_REQUEST = 'VKApiRequest';
    protected const VK_API_CLIENT = 'VKApiClient';
    protected const VK_API_HOST = 'VK_API_HOST';
    protected const VK_API_VERSION = 'VK_API_VERSION';
    protected const VK_API_VERSION_VALUE = '5.69';
    protected const PHP = '.php';
    protected const ARG_ACCESS_TOKEN = 'access_token';
    protected const ARG_PARAMS = 'params';

    protected const KEY_NAME = 'name';
    protected const KEY_DESCRIPTION = 'description';
    protected const KEY_PARAMETERS = 'parameters';
    protected const KEY_ENUM = 'enum';
    protected const KEY_ENUM_NAMES = 'enumNames';
    protected const KEY_TYPE = 'type';
    protected const KEY_ERRORS = 'errors';

    protected const LINK_SCHEMA = 'https://raw.githubusercontent.com/VKCOM/vk-api-schema/master/';
    protected const LINK_METHODS = self::LINK_SCHEMA . 'methods.json';
    protected const LINK_VK_API_HOST = 'https://api.vk.com/method';

    protected const PATH_SCHEMA = '/vendor/vkcom/vk-api-schema/methods.json';
    protected const SRC_VK = '/src/VK/';

    protected const USE_VK = self::KEYWORD_USE . self::SPACE . self::VK_NAMESPACE . self::BACKSLASH;
    protected const USE_VK_API_EXCEPTIONS = self::USE_VK . 'Exceptions\Api\\';
    protected const USE_VK_API_EXCEPTION = self::USE_VK_API_EXCEPTIONS . 'VKApiException;';
    protected const USE_VK_CLIENT_EXCEPTION = self::USE_VK . 'Exceptions\VKClientException;';
    protected const USE_VK_API_REQUEST = self::USE_VK . self::KEYWORD_CLIENT . self::BACKSLASH . self::VK_API_REQUEST . ';';

    protected $response = null;
    protected $enums_path = null;
    protected $api_client_use = '';
    protected $api_client_members = '';
    protected $api_client_construct_code = '';
    protected $api_client_gets = '';
    protected $api_request_member = null;

    protected function getSchemaResponse() {
        $curl = curl_init(static::LINK_METHODS);
        curl_setopt_array($curl, array(
            CURLOPT_CONNECTTIMEOUT => static::CONNECTION_TIMEOUT,
            CURLOPT_RETURNTRANSFER => true,
        ));
        $raw_response = curl_exec($curl);
        $this->response = json_decode($raw_response, true);
    }

    protected function getSchemaFromFile($path) {
        $schema = file_get_contents($path);
        $this->response = json_decode($schema, true);
    }

    private static function tab($count) {
        return str_repeat(' ', static::TAB_SIZE * $count);
    }

    private function checkDirPath($path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    public function generate($schema_path = null, $actions_output_path = null, $api_client_output_path = null) {
        if ($schema_path == null) {
            $schema_path = (dirname(__DIR__)) .
                static::PATH_SCHEMA;
        }
        $this->getSchemaFromFile($schema_path);

        if ($actions_output_path == null) {
            $actions_output_path = dirname(__DIR__) . static::SRC_VK . static::KEYWORD_ACTIONS . static::SLASH;
            $this->checkDirPath($actions_output_path);
        }

        if ($api_client_output_path == null) {
            $api_client_output_path = dirname(__DIR__) . static::SRC_VK . static::KEYWORD_CLIENT . static::SLASH;
            $this->checkDirPath($api_client_output_path);
        }

        $this->enums_path = dirname(__DIR__) . static::SRC_VK . static::KEYWORD_ACTIONS . static::SLASH .
            static::KEYWORD_ENUMS . static::SLASH;
        $this->checkDirPath($this->enums_path);

        $mapped_methods = $this->mapMethods();
        ksort($mapped_methods);

        $this->api_request_member = $this->wrapClassMember(self::VK_API_REQUEST, static::VK_API_REQUEST_VAR_NAME);

        $this->api_client_members .= $this->wrapConstant(static::VK_API_VERSION, static::VK_API_VERSION_VALUE,
            '', 'protected ');
        $this->api_client_members .= $this->api_request_member;
        $this->api_client_construct_code = $this->wrapConstructAssignment(static::VK_API_REQUEST_VAR_NAME,
            static::KEYWORD_NEW . self::VK_API_REQUEST . '($default_language, $api_version)');

        $this->api_client_gets = PHP_EOL . $this->wrapComment(array('@return ' . static::VK_API_REQUEST));
        $this->api_client_gets .= $this->wrapGetActionMethod(static::VK_API_REQUEST_VAR_NAME);
        $this->api_client_use = $this->wrapClassUse(self::VK_CLIENT . self::BACKSLASH . self::KEYWORD_ENUMS, self::VK_LANGUAGE);

        foreach ($mapped_methods as $action_name => &$action_methods) {
            $class_name = ucwords($action_name);

            $this->updateApiActionClientProperties($class_name, $action_name);

            $action_class_code = '';
            $action_exceptions = array();
            foreach ($action_methods as &$method) {
                $action_class_code .= $this->wrapActionMethod($method, $action_name, $action_exceptions);
            }

            $action_class_use = PHP_EOL . static::USE_VK_API_REQUEST;
            $action_class_use .= PHP_EOL . static::USE_VK_CLIENT_EXCEPTION;
            $action_class_use .= PHP_EOL . static::USE_VK_API_EXCEPTION;
            $action_class_use .= $this->addActionExceptionsToUse($action_exceptions);
            $action_class_use .= $this->addActionEnumsToUse($action_methods, $action_name);
            $action_class_members = $this->api_request_member;
            $action_class_construct = $this->wrapConstruct($class_name, static::VK_API_REQUEST . static::SPACE .
                static::DOLLAR . static::VK_API_REQUEST_VAR_NAME,
                $this->wrapConstructAssignment(static::VK_API_REQUEST_VAR_NAME,
                    static::DOLLAR . static::VK_API_REQUEST_VAR_NAME));

            $action_class = $this->wrapClass($class_name, static::VK_ACTIONS, $action_class_use,
                $action_class_members, $action_class_construct, $action_class_code);

            $file_name = $actions_output_path . $class_name . static::PHP;
            file_put_contents($file_name, $action_class);
        }

        $api_client_class_name = static::VK_API_CLIENT;
        $api_client_construct = $this->wrapConstruct($api_client_class_name, 'string $default_language = VKLanguage::RUSSIAN, string $api_version = self::VK_API_VERSION', $this->api_client_construct_code);

        $api_client_class = $this->wrapClass($api_client_class_name, static::VK_CLIENT,
            $this->api_client_use, $this->api_client_members, $api_client_construct, $this->api_client_gets);

        $file_name = $api_client_output_path . $api_client_class_name . static::PHP;

        file_put_contents($file_name, $api_client_class);

        echo 'SDK is generated.' . PHP_EOL;
    }

    protected function mapMethods() {
        $mapped_methods = array();
        array_walk($this->response[static::KEYWORD_METHODS], function ($method) use (&$mapped_methods) {
            list($action_name, $method_name) = explode(static::DOT, $method[static::KEY_NAME]);
            if (!isset($mapped_methods[$action_name])) {
                $mapped_methods[$action_name] = array();
            }
            $method[static::KEY_NAME] = $method_name;
            $mapped_methods[$action_name][] = $method;
        });
        return $mapped_methods;
    }

    protected function updateApiActionClientProperties($class_name, $action_name) {
        $this->api_client_use .= $this->wrapActionClassUse($class_name);

        $this->api_client_members .= $this->wrapClassMember($class_name, $action_name);

        $value = static::KEYWORD_NEW . $class_name . '(' . static::DOLLAR . static::KEYWORD_THIS . static::VK_API_REQUEST_VAR_NAME . ')';
        $this->api_client_construct_code .= $this->wrapConstructAssignment($action_name, $value);

        $this->api_client_gets .= PHP_EOL . $this->wrapComment(array('@return ' . $class_name));
        $this->api_client_gets .= $this->wrapGetActionMethod($action_name);
    }

    protected function wrapClass($name, $namespace, $use, $members, $construct, $code) {
        $result = '<?php' . PHP_EOL . PHP_EOL;
        if (isset($namespace)) {
            $result .= 'namespace ' . $namespace . ';' . PHP_EOL;
        }
        if (isset($use)) {
            $result .= $use . PHP_EOL;
        }
        $result .= PHP_EOL . 'class ' . $name . ' {';
        if (isset($members)) {
            $result .= $members;
        }
        if (isset($construct)) {
            $result .= PHP_EOL . PHP_EOL . $construct;
        }
        if (isset($code)) {
            $result .= $code;
        }
        $result .= PHP_EOL . '}' . PHP_EOL;
        return $result;
    }

    protected function wrapActionMethod($method, $action_name, &$exception_names) {
        $method_name = $method[static::KEY_NAME];
        $add_params = function ($param) use (&$action_name, &$method_name) {
            $result = static::SPACE . $this->tab(1) . static::DASH . static::SPACE;
            $need_space = false;

            if (isset($param[static::KEY_ENUM])) {
                $enum_name = $this->createParameterEnum($param, $param[static::KEY_NAME], $method_name, $action_name);
                $result .= $enum_name;
                $description_end = '@see ' . $enum_name;
                $need_space = true;
            } else if (isset($param[static::KEY_TYPE])) {
                $result .= $param[static::KEY_TYPE];
                $need_space = true;
            }
            if (isset($param[static::KEY_NAME])) {
                if ($need_space) {
                    $result .= static::SPACE;
                }
                $result .= $param[static::KEY_NAME];
                $need_space = true;
            }

            $result .= static::COLON;

            if (isset($param[static::KEY_DESCRIPTION])) {
                if ($need_space) {
                    $result .= static::SPACE;
                }
                $result .= $param[static::KEY_DESCRIPTION];
            }
            $result = wordwrap($result, static::LINE_LENGTH_PARAMETER, PHP_EOL .
                $this->tab(1) . static::SPACE3);
            $result = explode(PHP_EOL, $result);
            if (isset($description_end)) {
                $result[] = $this->tab(1) . static::SPACE3 . $description_end;
            }
            return $result;
        };

        $params = array();
        if (isset($method[static::KEY_PARAMETERS]) && $method[static::KEY_PARAMETERS] !== array()) {
            $params = array_map($add_params, $method[static::KEY_PARAMETERS]);
            $params = call_user_func_array('array_merge', $params);
        }

        $result = PHP_EOL . PHP_EOL;

        $method_description = '';
        if (isset($method[static::KEY_DESCRIPTION])) {
            $method_description = $method[static::KEY_DESCRIPTION];
        }

        $method_errors = array('', '@return mixed',
            '@throws VKClientException in case of network error',
            '@throws VKApiException in case of network error');
        if (isset($method[static::KEY_ERRORS])) {
            foreach ($method[static::KEY_ERRORS] as $error) {
                $exception_name = static::parseErrorName($error['name']);
                $error_text = '@throws ' . $exception_name;

                if (!in_array($exception_name, $exception_names)) {
                    array_push($exception_names, $exception_name);
                }

                if (isset($error['description'])) {
                    $error_text .= self::SPACE . $error['description'];
                }
                array_push($method_errors, $error_text);
            }
        }
        array_push($method_errors, '');

        $method_description = wordwrap($method_description, static::LINE_LENGTH_DESCRIPTION, PHP_EOL);
        $method_description_array = explode(PHP_EOL, $method_description);

        $result .= $this->wrapComment(array_merge($method_description_array, array('', '@param ' . static::DOLLAR .
        static::ARG_ACCESS_TOKEN . ' string', '@param ' . static::DOLLAR .
            static::ARG_PARAMS . ' array'), $params, $method_errors)) . PHP_EOL;

        $result .= $this->tab(1) . 'public function ' . $method_name . '(string ' . static::DOLLAR . static::ARG_ACCESS_TOKEN
            . ', array ' . static::DOLLAR . static::ARG_PARAMS . ' = array()) {' . PHP_EOL;

        $result .= $this->tab(2) . static::KEYWORD_RETURN . static::DOLLAR . static::KEYWORD_THIS .
            static::VK_API_REQUEST_VAR_NAME . '->post(' . static::QUOTE . $action_name . static::DOT .
            $method[static::KEY_NAME] . static::QUOTE . ', ' . static::DOLLAR . static::ARG_ACCESS_TOKEN .
            ', ' . static::DOLLAR . static::ARG_PARAMS . ');' . PHP_EOL;

        $result .= $this->tab(1) . '}';

        return $result;
    }

    protected function parseErrorName(string $name) {
        $error_name = str_replace(static::SPACE, '',
            ucwords(str_replace(static::UNDERSCORE, static::SPACE, strtolower($name))));
        $error_name = str_replace('Error', '', $error_name);
        $error_name = self::VK_NAMESPACE . $error_name;
        $error_name .= 'Exception';
        return $error_name;
    }

    protected function createParameterEnum($param, $parameter_name, $method_name, $action_name) {
        $enum_name = $this->buildEnumName($parameter_name, $method_name, $action_name);

        $enum_members = $this->createEnumClassMembers($param);
        $enum_class = $this->wrapClass($enum_name, static::VK_ENUMS, null, $enum_members,
            null, null);

        $filename = $this->enums_path . $enum_name . static::PHP;
        file_put_contents($filename, $enum_class);

        return $enum_name;
    }

    protected function buildEnumName($parameter_name, $method_name, $action_name) {
        $result = ucwords($action_name) . ucwords($method_name);
        $result .= str_replace(static::SPACE, '', ucwords(str_replace(static::UNDERSCORE,
            static::SPACE, $parameter_name)));
        return $result;
    }

    protected function createEnumClassMembers($param) {
        $members = '';
        $enum = $param[static::KEY_ENUM];
        $enum_names = array();
        if (isset($param[static::KEY_ENUM_NAMES])) {
            $enum_names = $param[static::KEY_ENUM_NAMES];
        }
        for ($i = 0; $i < count($enum); $i++) {
            $value = $enum[$i];
            $description = $enum_names ? $enum_names[$i] : null;
            $members .= $this->wrapConstant(strtoupper($value), $value, $description, '', $param[static::KEY_NAME]);
        }
        return $members;
    }

    protected function wrapConstant($name, $value, $description, $type = '', $param_name = '') {
        $edges = '\'';
        if (is_numeric($name)) {
            $edges = '';
            $name = str_replace(static::SPACE, static::UNDERSCORE, strtoupper($description));
            $name = str_replace(array(static::COMMA, static::DOT), '', $name);
            if (is_numeric($name[0])) {
                $name = strtoupper($param_name) . static::UNDERSCORE . $name;
            }
        }
        $result = PHP_EOL . $this->tab(1) . $type . 'const ' . $name . ' = ' . $edges . $value . $edges . ';';
        if ($description) {
            $result .= ' // ' . $description;
        }
        return $result;
    }

    protected function wrapConstruct($class_name, $params, $code) {
        $result = $this->tab(1) . static::COMMENT_START . PHP_EOL;
        $result .= $this->tab(1) . static::SPACE . static::ASTERISK . static::SPACE . $class_name . static::SPACE . 'constructor.';
        foreach (explode(',', $params) as $param) {
            $result .= PHP_EOL . $this->tab(1) . static::SPACE . static::ASTERISK . static::SPACE . '@param' . static::SPACE . trim(explode('=', $param)[0]);
        }
        $result .= PHP_EOL . $this->tab(1) . static::SPACE . static::COMMENT_END . PHP_EOL;

        $result .= $this->tab(1) . 'public function __construct(' . $params . ') {';
        $result .= $code . PHP_EOL;
        $result .= $this->tab(1) . '}';
        return $result;
    }

    protected function wrapClassMember($type, $var_name) {
        $result = PHP_EOL . PHP_EOL . $this->wrapComment(array('@var ' . $type));
        $result .= PHP_EOL;
        $result .= $this->tab(1) . 'private ' . static::DOLLAR . $var_name . ';';
        return $result;
    }

    /**
     * @param array $comment
     *
     * @return string
     */
    protected function wrapComment($comment) {
        $result = $this->tab(1) . static::COMMENT_START;
        $format = function ($line) {
            return PHP_EOL . $this->tab(1) . static::SPACE . static::ASTERISK . static::SPACE . $line;
        };
        $result .= implode(array_map($format, $comment));
        $result .= PHP_EOL;
        $result .= $this->tab(1) . static::SPACE . static::COMMENT_END;
        return $result;
    }

    protected function wrapActionClassUse($class_name) {
        return PHP_EOL . static::KEYWORD_USE . static::SPACE . static::VK_ACTIONS . static::BACKSLASH . $class_name . ';';
    }

    protected function wrapClassUse($vk_namespace, $class_name) {
        return PHP_EOL . static::KEYWORD_USE . static::SPACE . $vk_namespace . static::BACKSLASH . $class_name . ';';
    }

    protected function wrapConstructAssignment($varName, $value) {
        return PHP_EOL . $this->tab(2) . static::DOLLAR . static::KEYWORD_THIS . $varName . ' = ' . $value . ';';
    }

    protected function wrapGetActionMethod($var_name) {
        $result = PHP_EOL;
        $result .= $this->tab(1) . 'public function ' . $var_name . '() {' . PHP_EOL;
        $result .= $this->tab(2) . static::KEYWORD_RETURN . static::DOLLAR . static::KEYWORD_THIS . $var_name . ';' . PHP_EOL;
        $result .= $this->tab(1) . '}' . PHP_EOL;
        return $result;
    }

    protected function addActionEnumsToUse($action_methods, $action_name) {
        $result = '';
        foreach ($action_methods as &$method) {
            if (isset($method[static::KEY_PARAMETERS])) {
                $params = $method[static::KEY_PARAMETERS];
                foreach ($params as &$param) {
                    if (isset($param[static::KEY_ENUM])) {
                        $result .= PHP_EOL . static::KEYWORD_USE . static::SPACE . static::VK_ENUMS . static::BACKSLASH .
                            $this->buildEnumName($param[static::KEY_NAME], $method[static::KEY_NAME], $action_name) . ';';
                    }
                }
            }
        }
        return $result;
    }

    protected function addActionExceptionsToUse($action_exceptions) {
        $result = '';
        foreach ($action_exceptions as $exception_name) {
            $result .= PHP_EOL . self::USE_VK_API_EXCEPTIONS . $exception_name . ';';
        }
        return $result;
    }
}
