<div class="sidebar" data-color="purple"  data-image="{{asset('backend/img/sidebar-3.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{route('welcome.index')}}" class="simple-text logo-normal">
          Mamma's Kitchen
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('home')? 'active':''}} ">
            <a class="nav-link" href="{{route('home')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{Request::is('home/slider*')? 'active':''}} ">
            <a class="nav-link" href="{{route('slider.index')}}">
              <i class="material-icons">slideshow</i>
              <p>Sliders</p>
            </a>
          </li>
          <li class="{{Request::is('home/category*')? 'active':''}}  ">
            <a class="nav-link" href="{{route('category.index')}}">
              <i class="material-icons">content_paste</i>
              <p>Categories</p>
            </a>
          </li>
          <li class="{{Request::is('home/item*')? 'active':''}}  ">
            <a class="nav-link" href="{{route('item.index')}}">
              <i class="material-icons">library_books</i>
              <p>Items</p>
            </a>
          </li>
          <li class="{{Request::is('home/reservation*')? 'active':''}} ">
            <a class="nav-link" href="{{route('reservation.index')}}">
              <i class="material-icons">Chrome_reader_mode</i>
              <p>Reservation</p>
            </a>
          </li>
          <li class="{{Request::is('home/contact*')? 'active':''}} ">
            <a class="nav-link" href="{{route('contact.index')}}">
              <i class="material-icons">message</i>
              <p>Contacts Messages</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>