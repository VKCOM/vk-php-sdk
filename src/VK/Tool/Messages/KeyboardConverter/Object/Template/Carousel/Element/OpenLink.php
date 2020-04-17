<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 15.12.19
 * Time: 2:33
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Element;


class OpenLink extends AbstractElement {

    private const KEY_LINK = 'link';

    /**
     * @var string
     */
    private $link;

    public function __construct(string $link, array $buttons, ?string $title = null, ?string $description = null, ?string $photoId = null) {
        $this->link = $link;
        parent::__construct($buttons, $title, $description, $photoId);
    }

    protected function action(): array {
        return [
            self::KEY_LINK => $this->link
        ];
    }

    protected function type(): string {
        return 'open_link';
    }
}