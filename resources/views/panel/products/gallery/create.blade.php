@extends('panel.layouts.main')
@section('main')
    <div class="col py-3">
        <div class="container-fluid p-5 bg-light">
            <h4>فرم ثبت گالری</h4>
            <form action="{{ route('products.gallery.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div id="images_section">

                    </div>
                </div>

                <button class="btn btn-danger mt-4" type="button" id="add_product_image">تصویر جدید</button>

                <div class="mt-5">

                    <button type="submit" class="btn btn-info">ثبت</button>
                    <a href="{{ route('products.gallery.index', $product->id) }}" class="btn btn-danger">لغو</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let createNewPic = ({
            id
        }) => {
            return `
            <div class="row img-field" id="image-${id}">
                <div class="col-5">
                    <div class="form-group">
                         <label>تصویر</label>
                         <div class="input-group">
                            <input type="text" class="form-control img_label" name="images[${id}][image]"
                                   aria-label="Image" aria-describedby="btn-image">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-image" type="button">انتخاب</button>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-2">
                    <label >اقدامات</label>
                    <div>
                        <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('image-${id}').remove()">حذف</button>
                    </div>
                </div>
            </div>
        `
        }

        $('#add_product_image').click(function() {
            let imagesSection = $('#images_section');
            let id = imagesSection.children().length;

            imagesSection.append(
                createNewPic({
                    id
                })
            );

        });
        $('#add_product_image').click();


        // input
        let image;
        $('body').on('click', '.btn-image', (event) => {
            event.preventDefault();

            image = $(event.target).closest('.img-field');

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });

        // set file link
        function fmSetLink($url) {
            image.find('.img_label').first().val($url);
        }
    </script>
@endsection
