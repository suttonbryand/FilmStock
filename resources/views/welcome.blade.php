
    @extends('layouts.app')

    @section('content')
        <div class="flex-center position-ref full-height">

            <div class="content container-fluid">
                <div class="row page-header">
                    <div class="col-md-12"><h1 class="text-center">Film Stock</h1></div>
                </div>

                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <form method="POST" action="/movies/search/">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <input class="btn btn-default" type="Submit" value="Submit" />
                                </span>
                            </div><!-- /input-group -->
                        </form>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-3"></div>                  
                </div><!-- /.row -->

                <div class="row links">
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <a href="movies/">Movies</a>
                        <a href="https://laracasts.com">Laracasts</a>
                        <a href="https://laravel-news.com">News</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    @endsection

