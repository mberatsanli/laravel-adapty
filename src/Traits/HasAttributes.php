<?php

namespace MBS\LaravelAdapty\Traits;

trait HasAttributes
{

    use \Illuminate\Database\Eloquent\Concerns\HasAttributes;

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    public static function fromArray($json = []): static
    {
        return (new static())->setRawAttributes($json);
    }

    public function getIncrementing()
    {
        return false;
    }

    public function usesTimestamps()
    {
        return false;
    }
}
