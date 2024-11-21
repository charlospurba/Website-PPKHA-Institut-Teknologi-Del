<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar</title>
    <style>
        /* Gaya tombol utama */
        .btn {
            background-color: #098ECC !important;
            color: white !important;
            border-color: #098ECC !important;
            transition: all 0.3s ease-in-out;
        }

        /* Gaya hover tombol */
        .btn:hover {
            background-color: #066D9E !important;
            border-color: #066D9E !important;
            color: white !important;
        }

        /* Gaya aktif atau fokus */
        .btn:active,
        .btn:focus {
            background-color: #04577A !important;
            border-color: #04577A !important;
            color: white !important;
            box-shadow: none !important;
        }
    </style>

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->

        @include('components.sidebar')
        <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Tambah Daftar Perusahaan</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Daftar Perusahaan
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <form> <!--begin::Body-->
                      <div class="card-body">
                          <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Nama Perusahaan</label> <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>

                          <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Link Perusahaan</label> <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>

                          <div class="input-group mb-3"> <input type="file" class="form-control" id="inputGroupFile02"> <label class="input-group-text" for="inputGroupFile02">Upload</label> </div>

                      </div> <!--end::Body--> <!--begin::Footer-->
                      <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div> <!--end::Footer-->
                  </form>
                </div>
                
            </div>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
           


        </main> <!--end::App Main--> <!--begin::Footer-->
        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end-->
            <!--begin::Copyright--> <strong>
              © 2024 PPKHA IT Del. All rights reserved.
            </strong>
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src={{"https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"}}
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src={{"https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"}}
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src={{"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"}}
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src={{"../../dist/js/adminlte.js"}}></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
   
        <!--end::Script-->
</body><!--end::Body-->

</html>
