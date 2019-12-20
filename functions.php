<?php


class MainMenu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $output .= "<li class='" . 'nav-item' . "'>";
        if ($permalink && $permalink != '#') {
            $output .= '<a href="' . $permalink . '" class="nav-link">';
        } else {
//            $output .= '<a data-toggle="collapse" class="nav-link  dropdown-toggle" href="' . $permalink . '" >';
            $output .=    ' <a class="nav-link  dropdown-toggle" data-toggle="collapse" href="#collapseExample" role="button"
               aria-expanded="false" aria-controls="collapseExample">';
        }

        $output .= $title;
        if ($description != '' && $depth == 0) {
            $output .= '<small class="description">' . $description . '</small>';
        }
        if ($permalink && $permalink != '#') {
            $output .= '</a>';
        } else {
            $output .= '</a>';
        }

    }
}

