<?php
class Comments
{
    private $id;
    private $owner;
    private $comments;

    public function __construct($owner, $comments) {
        $this->id = null;
        $this->owner = $owner;
        $this->comments = $comments;
    }

    public function setCommentsId($id) {
        $this->id = $id;
    }

    public function getCommentsId() {
        if ($this->id != null) {
            return $this->id;
        } else {
            return "null";
        }
    }

    public function getCommentsOwner() {
        return $this->owner;
    }

    public function getComments() {
        return $this->comments;
    }
}