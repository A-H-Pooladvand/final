<?php
/**
 * User: Amirhossein
 * Date: 1/29/2018
 * Time: 3:27 PM
 */

namespace App\Http\Controllers\_Controller;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Database\Eloquent\Model;

class TagHandler
{
    /**
     * @var Controller
     */
    private $controller;

    /**
     * Containing tags
     *
     * @var array
     */
    private $newTags;

    public function __construct(Controller $controller, array $newTags = null)
    {
        $this->controller = $controller;
        $this->newTags = $newTags;
    }


    /**
     * @param Model $model
     * @return bool
     */
    public function attach(Model $model)
    {
        if (empty($this->newTags))
            return false;

        $tags = $this->separateNewTagsFromAlreadyExistTags();

        $new_tag_ids = $this->createNewTagsAndAttachItToTheRelatedModel();

        $tags = array_merge($tags, $new_tag_ids);

        $model->tags()->attach($tags);
    }

    public function sync(Model $model)
    {
        if (empty($this->newTags))
            return false;

        $tags = $this->separateNewTagsFromAlreadyExistTags();

        $new_tag_ids = $this->createNewTagsAndAttachItToTheRelatedModel();

        $tags = array_merge($tags, $new_tag_ids);

        $model->tags()->sync($tags);
    }

    private function separateNewTagsFromAlreadyExistTags()
    {
        $tags = array_filter($this->newTags, function ($item) {
            if (is_numeric($item)) {
                $key = array_search($item, $this->newTags);
                unset($this->newTags[$key]);
                return $item;
            }
        });

        return $tags;
    }

    private function createNewTagsAndAttachItToTheRelatedModel()
    {
        $new_tag_ids = [];
        foreach ($this->newTags as $item) {
            $new_tag_ids[] = Tag::create(['title' => $item,]);
        }

        return array_column($new_tag_ids, 'id');
    }


}