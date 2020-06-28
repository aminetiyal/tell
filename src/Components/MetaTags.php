<?php

namespace Aminetiyal\Tell\Components;

use Aminetiyal\Tell\Models\TellPost;
use Illuminate\View\Component;

class MetaTags extends Component
{
    public $url;
    public $title;
    public $description;
    public $image;

    public function __construct(TellPost $post = null)
    {
        $this->post = $post;
        $this->setTitle();
        $this->setDescription();
        $this->setImage();
        $this->setUrl();
    }

    public function render()
    {
        return view('tell::components.meta-tags');
    }

    private function setTitle()
    {
        $this->title = !is_null($this->post) ? $this->post->title : config('tell.nav.title');
    }

    private function setDescription()
    {
        $this->description = !is_null($this->post) ? $this->post->excerpt : config('tell.nav.title');
    }

    private function setImage()
    {
        $this->image = request()->root();
        $this->image .= (!is_null($this->post) ? $this->post->image : config('tell.nav.logo'));
    }

    private function setUrl()
    {
        $this->url = request()->root();
        $this->url .= '/'. (!is_null($this->post) ? $this->post->slug : '');
    }
}
