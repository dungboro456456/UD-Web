@php
$level1Categories=$categories->filter(function($item){
    return $item->type==0;
});
$level2Categories=$categories->filter(function($item){
    return $item->type==1;
});
$level3Categories=$categories->filter(function($item){
    return $item->type==2;
});

$html='<nav class="megamenu">';
$html.='<ul class="nav nav-list">';
    foreach ($level1Categories as $level1Category){
        $html.='<li><a href="#">';
        $html.=$level1Category->cat_name;
        $html.='</a>';
        $html.='<ul>';
            foreach ($level2Categories as $level2Category){
            if($level2Category->parent_id==$level1Category->id){
                 $html.='<li><a href="#">';
                 $html.=$level2Category->cat_name;
                 $html.='</a>';

                    $html.='<ul>';
                    foreach ($level3Categories as $level3Category){
                    if($level3Category->parent_id==$level2Category->id){
                        $html.='<li><a href="#">';
                        $html.=$level3Category->cat_name;
                        $html.='</a>';
                        $html.='</li>';
                        }
                    }
                    $html.='</ul>';
                        
                 $html.='</li>';
            }
   
        }
        $html.='</ul>';
        $html.='</li>';
    }
$html.='</ul>';
$html.='</nav>';
echo $html;

@endphp

</nav> 