<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach($categories as $category)
                <li>
                    <a href="#">
                        <span class="pull-right">( {{ $category->products_count }} )</span>
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>