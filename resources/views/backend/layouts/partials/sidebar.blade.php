<li>
    <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/dashboard.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Dashboard</span>
        </div>
    </a>
</li>
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/orders1.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Orders</span>
        </div>
    </a>
    <ul>
        {{-- <li>
            <a href="{{ route('admin.order_statuses.index') }}">Order Status</a>
        </li> --}}
        <li><a href="{{ route('admin.orders.index') }}">All Orders</a></li>
        @foreach (\App\Models\OrderStatus::all() as $orderStatus)
            <li><a href="{{ url('admin/orders?status=') . $orderStatus->id }}">{{ ucfirst($orderStatus->name) }}
                    Orders</a></li>
        @endforeach
    </ul>
</li>
@if (isAdmin())
<li class="">
    <a href="{{ route('admin.call_to_actions.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/bullhorn-solid.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Ads</span>
        </div>
    </a>
</li>
@endif
{{-- @if (isAdmin())
    <li class="">
        <a href="{{ route('admin.currencies.index') }}" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
            </div>
            <div class="nav_title">
                <span>
                    Currencies</span>
            </div>
        </a>
    </li>
@endif --}}
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/shopping-cart-svgrepo-com.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Ecommerce</span>
        </div>
    </a>
    <ul>
        <li>
            <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}">Categories</a>
        </li>
        <li>
            <a href="{{ route('admin.brands.index') }}">Brands</a>
        </li>
        <li>
            <a href="{{ route('admin.types.index') }}">Types</a>
        </li>
        <li>
            <a href="{{ route('admin.units.index') }}">Units</a>
        </li>
        <li>
            <a href="{{ route('admin.nutrition.index') }}">Nutritions</a>
        </li>
    </ul>
</li>
<h4 class="menu-text"><span>VENDOR MANAGEMENT</span> <i class="fas fa-ellipsis-h"></i> </h4>
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/store-svgrepo-com.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Marketplace</span>
        </div>
    </a>
    <ul>
        <li>
            <a href="{{ route('admin.zones.index') }}">Zone</a>
        </li>
        <li>
            <a href="{{ route('admin.stores.index') }}">Stores</a>
        </li>
        @if (isAdmin())
        <li>
            <a href="{{ route('admin.shipping_services.index') }}">Shipping Service</a>
        </li>
        @endif
    </ul>
</li>
{{-- <li class="">
    <a href="{{ route('admin.carts.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Cart</span>
        </div>
    </a>
</li> --}}
<h4 class="menu-text"><span>DELIVERY MAN SECTION</span> <i class="fas fa-ellipsis-h"></i> </h4>
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/delivery-svgrepo-com.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Delivery Men</span>
        </div>
    </a>
    <ul>
        <li>
            <a href="{{ route('admin.delivery_men.index') }}">Delivery Men List</a>
        </li>
    </ul>
</li>
<li class="">
    <a href="{{ route('admin.delivery_man_review') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/chat-favorite.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Review</span>
        </div>
    </a>
</li>
@if (isAdmin())
<h4 class="menu-text"><span>WEB & APP SETTINGS</span> <i class="fas fa-ellipsis-h"></i> </h4>
    <li class="">
        <a class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="{{ asset('assets/img/menu-icon/settings-svgrepo-com.svg') }}" alt="">
            </div>
            <div class="nav_title">
                <span>Settings</span>
            </div>
        </a>
        <ul>
            <li><a href="{{ route('admin.settings.general') }}">General Settings</a></li>
            <li><a href="{{ route('admin.settings.email') }}">Email Settings</a></li>
            <li><a href="{{ route('admin.email_templates.index') }}">Email Templates</a></li>
            <li><a href="{{ route('admin.settings.payment_gateway') }}">Payment Gateway</a></li>
            <li><a href="{{ route('admin.settings.social.index') }}">Social Login</a></li>
            <li><a href="{{ route('admin.settings.social.media.index') }}">Social Media Link</a></li>
            {{-- <li><a href="#">Social Media Link</a></li> --}}
            {{-- <li><a href="{{ route('admin.shipping_services.index') }}">Shipping Service</a></li>
            <li><a href="{{ route('admin.taxes.index') }}">Tax</a></li> --}}
        </ul>
    </li>
    <li class="">
        <a href="{{ route('admin.contacts.index') }}" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="{{ asset('assets/img/menu-icon/contacts-svgrepo-com.svg') }}" alt="">
            </div>
            <div class="nav_title">
                <span>Contact</span>
            </div>
        </a>
    </li>
    <li class="">
        <a class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="{{ asset('assets/img/menu-icon/about-us-svgrepo-com.svg') }}" alt="">
            </div>
            <div class="nav_title">
                <span>About</span>
            </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.abouts.index') }}">About Info</a>
            </li>
            <li>
                <a href="{{ route('admin.about.slider.index') }}">About Image slider</a>
            </li>
            <li>
                <a href="{{ route('admin.about.service.index') }}">About Service</a>
            </li>
            <li>
                <a href="{{ route('admin.about.performance') }}">About Performance</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('admin.faqs.index') }}">
            <div class="nav_icon_small">
                <img src="{{ asset('assets/img/menu-icon/faq.svg') }}" alt="">
            </div>
            <div class="nav_title">
                <span>FAQ</span>
            </div>
        </a>
    </li>
    <li class="">
        <a class="has-arrow" href="#" aria-expanded="false">
            <div class="nav_icon_small">
                <img src="{{ asset('assets/img/menu-icon/administrator-developer.svg') }}" alt="">
            </div>
            <div class="nav_title">
                <span>Administration</span>
            </div>
        </a>
        <ul>
            <li>
                <a href="{{ route('admin.users.index') }}">Users</a>
            </li>
            <li>
                <a href="{{ route('admin.promos.index') }}">Promos</a>
            </li>
            <li>
                <a href="{{ route('admin.banners.index') }}">Banner sliders</a>
            </li>
        </ul>
    </li>
@endif
