<?php

class Meal
{
    private int $author;
    private string $title;
    private int $time;
    private string $recipe;
    private string $description;
    private string $image;

    public function __construct($author, $title, $time, $recipe, $description, $image)
    {
        $this->author = $author;
        $this->title = $title;
        $this->time = $time;
        $this->recipe = $recipe;
        $this->description = $description;
        $this->image = $image;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getAuthor() : int
    {
        return $this->author;
    }

    public function setAuthor(int $author)
    {
        $this->author = $author;
    }

    public function getTime() : int
    {
        return $this->time;
    }

    public function setTime(int $time)
    {
        $this->time = $time;
    }

    public function getRecipe() : string
    {
        return $this->recipe;
    }

    public function setRecipe(string $recipe)
    {
        $this->recipe = $recipe;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }
}