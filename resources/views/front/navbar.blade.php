<?php function write($data,$i) { ?>
        <ul class="my-menu-list">
        <?php if($i!=0) : ?>
            <li><a class="my-menu-back">Назад</a></li>
        <?php endif;?>
        <?php foreach ($data as $itemSection) : ?>
            
                <li>
                    <a {{$itemSection->children->isNotEmpty() ? '' : 'href="http://vk.com"'}}>{{$itemSection->name}}
                    @if($itemSection->children->isNotEmpty())
                        <span class="fa fa-angle-right float-right pt-1"></span>
                    @endif
                    </a>
                    <?php if($itemSection->children->isNotEmpty()) : ?>
                        <?php write($itemSection->children,1);?>
                    <?php endif;?>
                </li>


        <?php endforeach; ?>
        </ul>
<?php } ?>


<div class="container">
<div class="my-menu">
    <a class="my-action btn btn-danger">
        Каталог товаров
        <i class="fa fa-angle-down"></i>
    </a>

    <div class="my-menu-wrapper d-none">
        <div class="my-menu-header">
            Товары
            <span class="fa fa-close my-menu-close"></span>
        </div>
        <div class="my-menu-drop ">
            <?php write($categoryItems->where('parent_id',0),0);?>
        </div>
    </div>
</div>
</div>






<!-- <div class="container">
<div class="my-menu">
    <a class="my-action btn btn-danger">
        Каталог товаров
    </a>

    <div class="my-menu-wrapper d-none">
        <div class="my-menu-header">
            Заголовок
            <span class="fa fa-close my-menu-close"></span>
        </div>
        <div class="my-menu-drop ">
            <ul class="my-menu-list">
                <li>
                    <a>Автохимия<span class="fa fa-angle-right float-right pt-1"></span></a>
                    
                    <ul class="my-menu-list">
                        
                        <li><a class="my-menu-back">Назад</a></li>

                        <li>
                            <a>Масла<span class="fa fa-angle-right float-right pt-1"></span></a>
                            <ul class="my-menu-list">

                                <li><a class="my-menu-back">Назад</a></li>

                                <li><a>Синтетические</a></li>
                                <li><a>Полусинтетические</a></li>
                                <li><a>Минеральные</a></li>
                            </ul>
                        </li>

                        <li>
                            <a>Антифриз<span class="fa fa-angle-right float-right pt-1"></span></a>
                            <ul class="my-menu-list">

                                <li><a class="my-menu-back">Назад</a></li>

                                <li><a>G11</a></li>
                                <li><a>G12</a></li>
                            </ul>
                        </li>

                    </ul>

                </li>

                <li>
                    <a>Колёса<span class="fa fa-angle-right float-right pt-1"></a>
                    <ul class="my-menu-list">
                        
                        <li><a class="my-menu-back">Назад</a></li>

                        <li>
                            <a>Диски<span class="fa fa-angle-right float-right pt-1"></span></a>
                            <ul class="my-menu-list">

                                <li><a class="my-menu-back">Назад</a></li>

                                <li><a>Кованные</a></li>
                                <li><a>Литые</a></li>
                                <li><a>Штампованные</a></li>
                            </ul>
                        </li>
                        <li><a>Шины</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
</div> -->