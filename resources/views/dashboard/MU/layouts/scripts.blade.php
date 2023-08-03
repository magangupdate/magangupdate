{{--==================== SCRIPTS ====================--}}
<script
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"
></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

<script src="{{ asset('assets/js/MU/donut_chart.js') }}"></script>
<script src="{{ asset('assets/js/MU/line_chart.js') }}"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.tiny.cloud/1/zhf194pj9ma6yja8lros9l6orpka9f1dvnj5zhbtfk3m26lf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    $(document).ready(function () {
        $('.sidebarCollapseDefault').on('click', function () {
          $('.sidebar').toggleClass('active');
          $('.content').toggleClass('active');
        });
    });

    $(document).ready(function () {
        $('#example').DataTable({
            language: {
                searchPlaceholder: "Search data record"
            }
        });
    });

    $(document).ready(function () {
        $('#example2').DataTable({
            language: {
                searchPlaceholder: "Search activity logs"
            }
        });
    });
    
    tinymce.init({
        selector: '#createArticle',
        height: 700,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
        },
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'image code'
        ],
        toolbar1: 'undo redo | blocks | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help | image code | insertfile undo redo',
        toolbar2: 'table tablecellprops tablecopyrow tablecutrow tabledelete tabledeletecol tabledeleterow tableinsertdialog tableinsertcolafter tableinsertcolbefore tableinsertrowafter tableinsertrowbefore tablemergecells tablepasterowafter tablepasterowbefore tableprops tablerowprops tablesplitcells tableclass tablecellclass tablecellvalign tablecellborderwidth tablecellborderstyle tablecaption tablecellbackgroundcolor tablecellbordercolor tablerowheader tablecolheader',
        image_title: true,
        automatic_uploads: true,
        images_upload_url: '/dashboard/upload-image',
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        },
        content_style: "body { font-family: Poppins; background: #2d2d2d; color: #f1f1f1; }",
    });

    const dragArea = document.querySelector('.drag-area');
    const dragText = document.querySelector('form.create-article');
    const browseThumbnail = document.querySelector('.browse-thumbnail');
        
    let file;
    let button = document.querySelector('.button');
    let input = document.querySelector('.thumbnail-input');
    let imgPreview = document.querySelector('.img-preview');

    let buttonProfile = document.querySelector('.btn-profile');
    let inputProfile = document.querySelector('.profile-input');
    let imgPreviewProfile = document.querySelector('.img-profile');

    button.onclick = () => {
        input.click();
    }

    input.onclick = () => {
        input.click();
    }

    input.addEventListener('change', function() {
        file = input.files[0];
        browseThumbnail.style.display = 'none';
        imgPreview.style.display = 'block';
        imgPreview.src = URL.createObjectURL(file);
        dragArea.classList.add('active');
    })

    const btnEdit = document.querySelector('#btn-edit');
    const editContainer = document.querySelector('#edit-container');
    const previewContainer = document.querySelector('#preview-container');
    const btnArticle = document.querySelector('#btn-article');
        btnEdit.addEventListener('click', () => {
        editContainer.style.display = 'block';
        previewContainer.style.display = 'none';
        btnArticle.innerHTML = `<i class='bx bx-info-circle' ></i>`
        btnArticle.onclick = () => {
            window.location.reload(true);
        }
    })
</script>