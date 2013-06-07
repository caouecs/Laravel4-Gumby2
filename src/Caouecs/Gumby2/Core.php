<?php

namespace Caouecs\Gumby2;

class Core {

    /**
     * Add a link
     *
     * @access public
     * @param string $link
     * @return \Image
     */
    public function link($link)
    {
        $this->link = (string) $link;

        return $this;
    }

}
