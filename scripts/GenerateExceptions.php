<?php

class GenerateExceptions {

    protected const COMMENT_START = '/**';
    protected const COMMENT_END = '*/';
    protected const ASTERISK = '*';
    protected const SPACE = ' ';
    protected const UNDERSCORE = '_';
    protected const COLON = ':';
    protected const COMMA = ', ';
    protected const QUOTE = '\'';
    protected const CLOSING_BRACKET = '}';

    protected const TAB_SIZE = 4;

    protected const KEY_ERRORS = 'errors';
    protected const KEY_NAME = 'name';
    protected const KEY_CODE = 'code';
    protected const KEY_DESCRIPTION = 'description';
    protected const PHP = '.php';
    protected const EXCEPTION_MAPPER = 'ExceptionMapper';

    protected const VK_NAMESPACE = 'VK';
    protected const VK_API_EXCEPTION_CLASS_NAME = 'VKApiException';
    protected const NAMESPACE_API = 'VK\Exceptions\Api';
    protected const DEFAULT_EXCEPTION_MESSAGE = 'Unknown error';

    protected const PATH_SCHEMA = '/vendor/vkcom/vk-api-schema/methods.json';
    protected const PATH_EXCEPTIONS = '/src/VK/Exceptions/Api/';

    protected $response = null;
    protected $switch_content = array();

    public function initSchemaFromFile(string $path = null) {
        if ($path == null) {
            $path = dirname(__DIR__) . static::PATH_SCHEMA;
        }

        $schema = file_get_contents($path);
        $this->response = json_decode($schema, true);
    }

    public function initSchemaMethodFromJson(array $json) {
        if (isset($json['errors'])) {
            $this->response = $json;
        } else {
            throw new InvalidArgumentException('Cannot read "errors" field from json');
        }
    }

    private static function tab(int $count) {
        return str_repeat(' ', static::TAB_SIZE * $count);
    }

    public function generate(string $file_path = null, string $json_file_path = null) {
        self::initSchemaFromFile($file_path);
        self::generateInitiatedSchema();

        if ($json_file_path == null) {
            $schema = file_get_contents(dirname(__DIR__) . self::PATH_SCHEMA);
        } else {
            $schema = file_get_contents($json_file_path);
        }
        $schema = json_decode($schema, true);

        foreach ($schema['methods'] as $method) {
            if (isset($method['errors'])) {
                self::initSchemaMethodFromJson($method);
                self::generateInitiatedSchema();
            }
        }

        self::writeMapper();
    }

    public function generateInitiatedSchema(string $exceptions_path = null) {
        if ($exceptions_path == null) {
            $exceptions_path = dirname(__DIR__) . static::PATH_EXCEPTIONS;
        }

        $errors = $this->response[static::KEY_ERRORS];

        foreach ($errors as $error) {
            $name = $error[static::KEY_NAME];
            $code = $error[static::KEY_CODE];
            $description = str_replace('\'', '\\\'', $error[static::KEY_DESCRIPTION]);

            $class_name = str_replace(static::SPACE, '',
                ucwords(str_replace(static::UNDERSCORE, static::SPACE, strtolower($name))));
            $class_name = str_replace('Error', '', $class_name);
            $class_name = self::VK_NAMESPACE . $class_name;
            $class_name .= 'Exception';

            $this->switch_content[$code] = $class_name;

            $exception_construct = $this->wrapExceptionConstruct($class_name, $code, $description);

            $exception_content = $this->wrapClass($class_name, static::NAMESPACE_API, null,
                static::VK_API_EXCEPTION_CLASS_NAME, null, $exception_construct, null);

            file_put_contents($exceptions_path . $class_name . static::PHP, $exception_content);
        }
    }

    public function writeMapper(string $mapper_path = null) {
        if ($mapper_path == null) {
            $mapper_path = dirname(__DIR__) . static::PATH_EXCEPTIONS;
        }

        $switch_sorted_content = '';
        ksort($this->switch_content);
        foreach ($this->switch_content as $code => $class_name) {
            $switch_sorted_content .= $this->wrapSwitchCase($code, $class_name);
        }

        $mapper_code = PHP_EOL . $this->buildParseFunction($switch_sorted_content);
        $mapper_content = $this->wrapClass(static::EXCEPTION_MAPPER, static::NAMESPACE_API,
            'use VK\Client\VKApiError;', null, null, null, $mapper_code);

        file_put_contents($mapper_path . static::EXCEPTION_MAPPER . static::PHP, $mapper_content);
    }

    protected function wrapSwitchCase(int $code, string $class_name) {
        $result = $this->tab(3) . 'case ' . $code . '' . static::COLON . PHP_EOL;
        $result .= $this->tab(4)  . 'return new ' . $class_name . '($error->getErrorMsg());' . PHP_EOL;
        return $result;
    }

    protected function wrapClass($name, $namespace, $use, $extends, $members, $construct, $code) {
        $result = '<?php' . PHP_EOL . PHP_EOL;
        if (isset($namespace)) {
            $result .= 'namespace ' . $namespace . ';' . PHP_EOL;
        }
        if (isset($use)) {
            $result .= PHP_EOL . $use . PHP_EOL;
        }
        $result .= PHP_EOL . 'class ' . $name;
        if (isset($extends)) {
            $result .= ' extends ' . $extends;
        }
        $result .= ' {';
        if (isset($members)) {
            $result .= $members;
        }
        if (isset($construct)) {
            $result .= PHP_EOL . $construct;
        }
        if (isset($code)) {
            $result .= $code;
        }
        $result .= PHP_EOL . static::CLOSING_BRACKET . PHP_EOL;
        return $result;
    }

    protected function wrapExceptionConstruct(string $class_name, int $code, string $description) {
        $result = $this->tab(1) . static::COMMENT_START . PHP_EOL;
        $result .= $this->tab(1) . static::SPACE . static::ASTERISK . static::SPACE . $class_name . static::SPACE . 'constructor.';
        $result .= PHP_EOL . $this->tab(1) . static::SPACE . static::ASTERISK . static::SPACE . '@param string $message';
        $result .= PHP_EOL . $this->tab(1) . static::SPACE . static::COMMENT_END . PHP_EOL;

        $result .= $this->tab(1) . 'public function __construct(string $message) {';
        $result .= PHP_EOL . $this->tab(2) . 'parent::__construct(' . $code . static::COMMA;
        $result .= static::QUOTE . $description . static::QUOTE . static::COMMA. '$message);';
        $result .= PHP_EOL . $this->tab(1) . static::CLOSING_BRACKET;
        return $result;
    }

    protected function buildParseFunction($switch_content) {
        $result = $this->tab(1) . 'public static function parse(VKApiError $error) {';
        $result .= PHP_EOL . $this->tab(2) . 'switch($error->getErrorCode()) {';
        $result .= PHP_EOL . $switch_content;
        $result .= $this->tab(3) . 'default' . static::COLON;
        $result .= PHP_EOL . $this->tab(4) . 'return new ' . static::VK_API_EXCEPTION_CLASS_NAME . '($error->getErrorCode(), $error->getErrorMsg(), \'' . static::DEFAULT_EXCEPTION_MESSAGE . '\');';
        $result .= PHP_EOL . $this->tab(2) . static::CLOSING_BRACKET;
        $result .= PHP_EOL . $this->tab(1) . static::CLOSING_BRACKET;
        return $result;
    }
}