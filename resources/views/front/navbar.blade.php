<?php function write($data,$i,&$current='') { ?>
        <ul class="my-menu-list">
        @if($i!=0)
            <li><a class="my-menu-back">Назад</a></li>
        @endif

        @if($current) 
          <li>
            <a href="{{route('view.catalog',$current)}}" class="my-menu-all">
              Весь раздел {{$current->name}}
            </a>
          </li>
        @endif

        <?php foreach ($data as $itemSection) : ?>
            
                <li>
                  @if(!empty($itemSection->childrens))
                    <a>
                      {{$itemSection->name}}
                      <span class="fa fa-angle-right float-right pt-1"></span>
                    </a>
                  @else
                    <a href="{{route('view.catalog',$itemSection)}}">
                      {{$itemSection->name}}
                    </a>
                  @endif

                  @if(!empty($itemSection->childrens))
                      <?php $current = $itemSection;?>
                      <?php write($itemSection->childrens,1,$current);?>
                      <?php $current="";?>
                  @endif
                </li>


        <?php endforeach; ?>

        
        </ul>
<?php } ?>

<div>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
<div class="container">
  <a class="navbar-brand d-sm-none" href="#">Navbar1</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
            <div class="my-menu">
                <a class="my-action btn btn-danger">
                    Каталог товаров
                    <div style="width: 20px;display: inline-block;">
                    <i class="fa fa-bars"></i>
                    </div>
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
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Оплата</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Гарантия</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Контакты</a>
      </li>
    </ul>

    <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link cart" data-url="{{route('cart.get')}}">
          <i class="fa fa-shopping-cart"></i> 
          Корзина
          <span class="badge badge-pill badge-success"></span>
        </a>
      </li>
    </ul>
  </div>
</div>
</nav>
</div>