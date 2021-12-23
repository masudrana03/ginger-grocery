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
@if (isAdmin())
<li class="">
    <a href="{{ route('admin.brands.index') }}" aria-expanded="false" class="active">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Brands</span>
        </div>
    </a>
</li>
@endif
<li class="">
    <a href="{{ route('admin.promos.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Promos</span>
        </div>
    </a>
</li>
@if (isAdmin())
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
<li class="">
    <a href="{{ route('admin.users.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>
                Users</span>
        </div>
    </a>
</li>
@endif
<li class="">
    <a href="{{ route('admin.stores.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>
                Stores</span>
        </div>
    </a>
</li>
<li class="">
    <a href="{{ route('admin.call_to_actions.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Call to Action</span>
        </div>
    </a>
</li>

@if (isAdmin())

<li>
    <a href="{{ route('admin.banners.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>
                Banners</span>
        </div>
    </a>
</li>
@endif
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Products</span>
        </div>
    </a>
    <ul class="mm-collapse mm-show" style="height: 5px;">
        <li>
            <a href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}">Categories</a>
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
<li class="">
    <a href="{{ route('admin.carts.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Cart</span>
        </div>
    </a>
</li>
<li class="">
    <a href="{{ route('admin.zones.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Delivery Zone</span>
        </div>
    </a>
</li>
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Delivery Men</span>
        </div>
    </a>
    <ul class="mm-collapse mm-show" style="height: 5px;">
        <li>
            <a href="{{ route('admin.delivery_men.index') }}">Delivery Man Details</a>
        </li>
        <li>
            <a href="{{ route('admin.delivery_man_review') }}">Delivery Man Review</a>
        </li>
    </ul>
</li>
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Orders</span>
        </div>
    </a>
    <ul class="mm-collapse" style="height: 5px;">
        <li class="">
            <a href="{{ route('admin.order_statuses.index') }}">Order Status</a>
            <a href="{{ route('admin.orders.index') }}">All Orders</a>
            @foreach (\App\Models\OrderStatus::all() as $orderStatus)
                <a href="{{ url('admin/orders?status=') . $orderStatus->name }}">{{ ucfirst($orderStatus->name) }}
                    Orders</a>
            @endforeach
        </li>
    </ul>
</li>
@if (isAdmin())
<li class="">
    <a class="has-arrow" href="#" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/8.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>Settings</span>
        </div>
    </a>
    <ul style="height: 5px;">
        <li class="">
            <a href="{{ route('admin.settings.general') }}">General Settings</a>
            <a href="{{ route('admin.settings.email') }}">Email Settings</a>
            <a href="{{ route('admin.email_templates.index') }}">Email Templates</a>
            <a href="{{ route('admin.settings.payment_gateway') }}">Payment Gateway</a>
            <a href="{{ route('admin.shipping_services.index') }}">Shipping Service</a>
            <a href="{{ route('admin.taxes.index') }}">Tax</a>
        </li>
    </ul>
</li>
<li class="">
    <a href="{{ route('admin.faqs.index') }}" aria-expanded="false">
        <div class="nav_icon_small">
            <img src="{{ asset('assets/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
            <span>FAQ</span>
        </div>
    </a>
</li>

@endif

