@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li><a href="/manage/profile">Itemshop</a></li>
        <li class="is-active"><a href="/manage/changepassword" aria-current="page">Manage Category</a></li>
    </ul>
</nav>
<div class="tabs is-small">
    <ul>
        <li><a href="/manage/itemshop/item">Manage Item</a></li>
        <li class="is-active" href="/manage/itemshop/category"><a>Manage Category</a></li>
    </ul>
</div>
<h4 class="title is-size-4 force-bold">Category</h4>
<p class="subtitle is-size-6">Group up your item<b class="force-bold"></b></p>
<div class="field">
    <div class="columns">
        <div class="column is-12" style="height: 100%">

            <form action="{{ route('category.store')}}" method="post">
                @method('post')
                @csrf
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="text" name="category_name" placeholder="New category">
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-black">
                            Add
                        </button>
                    </div>
                </div>                    
            </form>


            <table class="table is-hoverable" style="width: 100%; margin-top: 1em;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $category)
                        <tr>
                            <th>{{ $category->category_id }}</th>
                            <th>{{ $category->category_name }}</th>
                            <th>
                                <div class="buttons">
                                    <a class="button is-light">Edit</a>
                                    <form action="{{ route('category.destroy', [$category->category_id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="button is-danger" value="Delete">Delete</button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection