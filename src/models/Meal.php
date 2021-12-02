<?php

class Meal
{
    private $title;
    private $author;
    private $time;
    private $recipe;
    private $description;
    private $image;
    private $reviews = [];

    public function __construct($title, $author, $time, $recipe, $description, $image)
    {
        $this->title = $title;
        $this->author = $author;
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

    public function getAuthor() : string
    {
        return $this->author;
    }

    public function setAuthor(string $author)
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

    public function getReviews(): array
    {
        return $this->reviews;
    }

    public function setReviews(array $reviews)
    {
        $this->reviews = $reviews;
    }
}