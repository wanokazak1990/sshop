<!-- <nav class="navbar navbar-expand-lg navbar-light" >
	<div class="container">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">

            @foreach ($categoryItems as $itemSection)
                @if(isset($itemSection->children))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $itemSection->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($itemSection->children as $itemChild)

                                <a class="dropdown-item" href="#">{{ $itemChild->name }}</a>

                            @endforeach
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">-{{ $itemSection->name }}</a>
                    </li>
                @endif

            @endforeach
	    </ul>

	    <ul class="navbar-nav ml-auto">

		    <li class="nav-item">
		        <a class="nav-link" href="#">Акции</a>
		    </li>
		    <li class="nav-item rose">
		        <a class="nav-link" href="#">Скидки</a>
		    </li>
		    <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Информация
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		    </li>
	  	</ul>

	  </div>
	</div>
</nav>


 -->


<!-- <nav class="container">
  <ul class="top-menu">
    <li><a href="">Главная</a></li>
    <li class="dropdown-standart"><a href="" class="dropdown">Страницы</a>
      <ul class="submenu-standart">
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
        <li><a href="">Элемент списка</a></li>
      </ul>
    </li>
    <li><a href="" class="dropdown">Магазин</a>
      <ul class="submenu">
        
        	<div class="row">
        		<div class="col-4">
        			1
        		</div>
        		<div class="col-4">
        			2
        		</div>
        		<div class="col-4">
        			3
        		</div>
        		<div class="col-4">
        			4
        		</div>
        		<div class="col-4">
        			5
        		</div>
        		<div class="col-4">
        			6
        		</div>
        		<div class="col-4">
        			7
        		</div>
        		<div class="col-4">
        			8
        		</div>
        		<div class="col-4">
        			9
        		</div>
        	</div>
      </ul>
    </li>
    <li><a href="">Портфолио</a></li>
    <li><a href="">Блог</a></li>
  </ul>
</nav> -->


        <div class="cd-dropdown-wrapper">
            <a class="cd-dropdown-trigger" href="#0">Выпадающее меню</a>
            <nav class="cd-dropdown">
                <h2>Заголовок</h2>
                <a href="#0" class="cd-close">Закрыть</a>
                <ul class="cd-dropdown-content">
                    <li>
                        <form class="cd-search">
                            <input type="search" placeholder="Поиск...">
                        </form>
                    </li>
                    <li class="has-children aim-main">
                        <a href="#">Одежда</a>
 
                        <ul class="cd-secondary-dropdown is-hidden">
                            <li class="go-back"><a href="#0">Меню</a></li>
                            <li class="see-all"><a href="#">Вся одежда</a></li>
                            <li class="has-children">
                                <a href="#">Аксессуары</a>
 
                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Одежда</a></li>
                                    <li class="see-all"><a href="#">Все аксессуары</a></li>
                                    <li class="has-children">
                                        <a href="#0">Шапочки</a>
 
                                        <ul class="is-hidden">
                                            <li class="go-back"><a href="#0">Аксессуары</a></li>
                                            <li class="see-all"><a href="#">Все шапочки</a></li>
                                            <li><a href="#">Головные уборы</a></li>
                                            <li><a href="#">Подарки</a></li>
                                            <li><a href="#">Шарфы</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#0">Головные уборы</a>
 
                                        <ul class="is-hidden">
                                            <li class="go-back"><a href="#0">Аксессуары</a></li>
                                            <li class="see-all"><a href="#">Все головные уборы</a></li>
                                            <li><a href="#">Шапочки</a></li>
                                            <li><a href="#">Шапки</a></li>
                                            <li><a href="#">Головные уборы</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Очки</a></li>
                                    <li><a href="#">Перчатки</a></li>
                                    <li><a href="#">Ювелирные изделия</a></li>
                                    <li><a href="#">Шарфы</a></li>
                                </ul>
                            </li>
 
                            <li class="has-children">
                                <a href="#">Верхняя одежда</a>
 
                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Одежда</a></li>
                                    <li class="see-all"><a href="#">Вся верхняя одежда</a></li>
                                    <li><a href="#">Повседневная брюки</a></li>
                                    <li class="has-children">
                                        <a href="#0">Джинсы</a>
 
                                        <ul class="is-hidden">
                                            <li class="go-back"><a href="#0">Верхняя одежда</a></li>
                                            <li class="see-all"><a href="#">Все джинсы</a></li>
                                            <li><a href="#">Рваные</a></li>
                                            <li><a href="#">Узкие</a></li>
                                            <li><a href="#">Зауженные</a></li>
                                            <li><a href="#">Прямые</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#0">Леггинсы</a></li>
                                    <li><a href="#0">Шорты</a></li>
                                </ul>
                            </li>
 
                        </ul> <!-- .cd-secondary-dropdown -->
                    </li> <!-- .has-children -->

                    <li class="has-children aim-main">
                        <a href="#">Одежда</a>
 
                        <ul class="cd-secondary-dropdown is-hidden">
                            <li class="go-back"><a href="#0">Меню</a></li>
                            <li class="see-all"><a href="#">Вся одежда</a></li>
                            <li class="has-children">
                                <a href="#">Аксессуары</a>
 
                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Одежда</a></li>
                                    <li class="see-all"><a href="#">Все аксессуары</a></li>
                                    <li class="has-children">
                                        <a href="#0">Шапочки</a>
 
                                        <ul class="is-hidden">
                                            <li class="go-back"><a href="#0">Аксессуары</a></li>
                                            <li class="see-all"><a href="#">Все шапочки</a></li>
                                            <li><a href="#">Головные уборы</a></li>
                                            <li><a href="#">Подарки</a></li>
                                            <li><a href="#">Шарфы</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#0">Головные уборы</a>
 
                                        <ul class="is-hidden">
                                            <li class="go-back"><a href="#0">Аксессуары</a></li>
                                            <li class="see-all"><a href="#">Все головные уборы</a></li>
                                            <li><a href="#">Шапочки</a></li>
                                            <li><a href="#">Шапки</a></li>
                                            <li><a href="#">Головные уборы</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Очки</a></li>
                                    <li><a href="#">Перчатки</a></li>
                                    <li><a href="#">Ювелирные изделия</a></li>
                                    <li><a href="#">Шарфы</a></li>
                                </ul>
                            </li>
 
                            <li class="has-children">
                                <a href="#">Верхняя одежда</a>
 
                                <ul class="is-hidden">
                                    <li class="go-back"><a href="#0">Одежда</a></li>
                                    <li class="see-all"><a href="#">Вся верхняя одежда</a></li>
                                    <li><a href="#">Повседневная брюки</a></li>
                                    <li class="has-children">
                                        <a href="#0">Джинсы</a>
 
                                        <ul class="is-hidden">
                                            <li class="go-back"><a href="#0">Верхняя одежда</a></li>
                                            <li class="see-all"><a href="#">Все джинсы</a></li>
                                            <li><a href="#">Рваные</a></li>
                                            <li><a href="#">Узкие</a></li>
                                            <li><a href="#">Зауженные</a></li>
                                            <li><a href="#">Прямые</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#0">Леггинсы</a></li>
                                    <li><a href="#0">Шорты</a></li>
                                </ul>
                            </li>
 
                        </ul> <!-- .cd-secondary-dropdown -->
                    </li> <!-- .has-children -->
 
                   
 
                    <li class="aim-main"><a href="#">Страница 1</a></li>
                    <li class="aim-main"><a href="#">Страница 2</a></li>
                    <li class="aim-main"><a href="#">Страница 3</a></li>
                </ul> <!-- .cd-dropdown-content -->
            </nav> <!-- .cd-dropdown -->
        </div> <!-- .cd-dropdown-wrapper -->
