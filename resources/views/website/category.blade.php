@extends('website.components.layout')

@section('title')
    edeck
@endsection

@section('content')

    <div class='row'>
        <div class='col-md-12'>
            <div class="search-result-container ">
                <div id="myTabContent" class="tab-content category-list">
                    <div class="tab-pane active " id="grid-container">
                        <div class="category-product">
                            <div class="row">
                                <input type="hidden" name="catslug" value="{{ $slug }}">
                                <div id="categoryProduct"></div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.category-product -->

                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.search-result-container -->
        </div>
        <!-- /.col -->
    </div>
    <br>

    <script>
        var token = $('input[name="_token"]').val();
        var slug = $('input[name="catslug"]').val();
        load_more('', token);
        function load_more(id = "", token) {

            $(".loader-box").show();
            $.ajax({
                url: '{{ route('load-more-cat-product') }}',
                method: 'POST',
                data: { id: id, _token: token, slug: slug },
                success: function (data) {
                    $('#loadMoreButton').remove();
                    $('#categoryProduct').append(data);

                    $(".loader-box").hide();
                }
            });
        }
        $('body').on('click', '#loadMoreButton', function () {
            var id = $(this).data('id');
            $('#loadMoreButton').html("Lodding...");
            load_more(id, token);
        });


    </script>
@endsection
