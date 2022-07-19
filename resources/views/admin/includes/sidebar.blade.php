 <!--begin::Aside-->
 <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
     <!--begin::Brand-->
     <div class="aside-logo flex-column-auto" id="kt_aside_logo" style="height: 120px;">
         <!--begin::Logo-->
         <a href="#" class="m-auto">
             <img alt="Logo" src="{{ $site_settings->logo }}" class=" logo" style="width: 150px;" />
         </a>
         <!--end::Logo-->
         <!--begin::Aside toggler-->
         <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="aside-minimize">
             <!--begin::Svg Icon | path: icons/stockholm/Navigation/Angle-double-left.svg-->
             <span class="svg-icon svg-icon-1 rotate-180">
                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                         <polygon points="0 0 24 0 24 24 0 24" />
                         <path
                             d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                             fill="#000000" fill-rule="nonzero"
                             transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                         <path
                             d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                             fill="#000000" fill-rule="nonzero" opacity="0.5"
                             transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                     </g>
                 </svg>
             </span>
             <!--end::Svg Icon-->
         </div>
         <!--end::Aside toggler-->
     </div>
     <!--end::Brand-->

     <!--begin::Aside menu-->
     <div class="aside-menu flex-column-fluid">
         <!--begin::Aside Menu-->
         <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
             <!--begin::Menu-->
             <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                 id="#kt_aside_menu" data-kt-menu="true">
                 <div class="menu-item">
                     <a class="menu-link active" href="{{ route('dashboard') }}">
                         <span class="menu-icon">
                             <!--begin::Svg Icon | path: icons/stockholm/Design/PenAndRuller.svg-->
                             <span class="svg-icon svg-icon-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
                                     <path
                                         d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                         fill="#000000" opacity="0.3" />
                                     <path
                                         d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                         fill="#000000" />
                                 </svg>
                             </span>
                             <!--end::Svg Icon-->
                         </span>
                         <span class="menu-title">@lang('site.dashboard')</span>
                     </a>
                 </div>
                 <div class="menu-item">
                     <div class="menu-content pt-8 pb-2">
                         <span class="menu-section text-muted text-uppercase fs-8">@lang('site.crafted')</span>
                     </div>
                 </div>
                 @if (auth()->user()->hasRole(['admin', 'moderator', 'kitchen']))
                     <!-- product -->
                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1">
                                         <path
                                             d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                             fill="#000000" opacity="0.3" />
                                         <path
                                             d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                             fill="#000000" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.products')</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion menu-active-bg">
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('product.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.products')</span>
                                 </a>
                             </div>
                             @if (auth()->user()->hasRole(['admin', 'moderator']))
                                 <div class="menu-item">
                                     <a class="menu-link" href="{{ route('category.index') }}">
                                         <span class="menu-bullet">
                                             <span class="bullet bullet-dot"></span>
                                         </span>
                                         <span class="menu-title">@lang('site.categories')</span>
                                     </a>
                                 </div>
                             @endif
                         </div>
                     </div>
                 @endif
                 <!-- end products -->

                 @if (auth()->user()->hasRole(['admin', 'moderator']))

                     <!-- Discount -->

                     <div class="menu-item">
                         <a class="menu-link" href="{{ route('discount.index') }}">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                         <path opacity="0.25"
                                             d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z"
                                             fill="#12131A" />
                                         <path opacity="0.25"
                                             d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z"
                                             fill="#12131A" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.discounts')</span>
                         </a>
                     </div>

                     <!-- end Discount -->


                      <!-- regions -->

                      <div class="menu-item">
                         <a class="menu-link" href="{{ route('region.index') }}">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                         <path opacity="0.25"
                                             d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z"
                                             fill="#12131A" />
                                         <path opacity="0.25"
                                             d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z"
                                             fill="#12131A" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.regions')</span>
                         </a>
                     </div>

                     <!-- end regions -->


                     <!-- Copons -->
                     <div class="menu-item">
                         <a class="menu-link" href="{{ route('copons.index') }}">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                         <path opacity="0.25"
                                             d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z"
                                             fill="#12131A" />
                                         <path opacity="0.25"
                                             d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z"
                                             fill="#12131A" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.coupons')</span>
                         </a>
                     </div>

                     <!-- end Copons -->


                     <!-- Branches -->


                     <div class="menu-item">
                         <a class="menu-link " href="{{ route('branch.index') }}">
                             <span class="menu-icon {{ Request::route('branch.index') ? 'active' : '' }}">
                                 <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none">
                                         <path opacity="0.25"
                                             d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z"
                                             fill="#12131A" />
                                         <path opacity="0.25"
                                             d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z"
                                             fill="#12131A" />
                                         <path
                                             d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z"
                                             fill="#12131A" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.branches')</span>
                         </a>
                     </div>

                     <!-- end Branches -->



                     <!--  table reservation  -->

                     <div class="menu-item">
                         <a class="menu-link" href="{{ route('TableReservations.index') }}">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <i class="nav-icon fas fa-table"></i>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.table_reservations')</span>
                         </a>
                     </div>

                     <!-- end table reservation -->
                 @endif




                 @if (auth()->user()->hasRole(['admin', 'kitchen', 'moderator']))

                     <!-- deliveryBoy -->
                     <div class="menu-item">
                         <a class="menu-link" href="{{ route('deliveryBoy.index') }}">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <i class="nav-icon fas fa-truck"></i>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.Delivery Boy')</span>
                         </a>
                     </div>

                     <!-- end deliveryBoy -->
                 @endif

                 @if (auth()->user()->hasRole(['admin', 'kitchen', 'moderator']))
                     <!-- orders -->

                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1">
                                         <path
                                             d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                             fill="#000000" opacity="0.3" />
                                         <path
                                             d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                             fill="#000000" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.orders')</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion menu-active-bg">
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('order.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.All Orders')</span>
                                 </a>
                             </div>
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('order.ByStatus', 'Pending') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.Pending Orders')</span>
                                 </a>
                             </div>

                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('order.ByStatus', 'Confirmed') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.Confirmed Orders')</span>
                                 </a>
                             </div>

                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('order.ByStatus', 'On Delivery') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.On Delivery Orders')</span>
                                 </a>
                             </div>

                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('order.ByStatus', 'Delivered') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.Delivered Orders')</span>
                                 </a>
                             </div>
                             ى

                         </div>
                     </div>

                     <!-- end orders -->
                 @endif


                 @if (auth()->user()->hasRole(['admin', 'kitchen', 'moderator']))
                     <!-- Package -->

                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1">
                                         <path
                                             d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                             fill="#000000" opacity="0.3" />
                                         <path
                                             d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                             fill="#000000" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.Packages')</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion menu-active-bg">
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('package.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.All Packages')</span>
                                 </a>
                             </div>
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('booked.packages') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.Booked Packages')</span>
                                 </a>
                             </div>

                         </div>
                     </div>

                     <!-- end package -->
                 @endif





                 @if (auth()->user()->hasRole(['admin']))
                     <!-- accounts -->
                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <polygon points="0 0 24 0 24 24 0 24" />
                                             <path
                                                 d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                 fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                             <path
                                                 d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                 fill="#000000" fill-rule="nonzero" />
                                         </g>
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.Accounts')</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion menu-active-bg">
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('user.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.All Users')</span>
                                 </a>
                             </div>

                         </div>
                     </div>

                     <!-- end accounts -->
                 @endif

                 @if (auth()->user()->hasRole(['admin', 'kitchen', 'moderator']))
                     <!-- site settings -->

                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1">
                                         <path
                                             d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                             fill="#000000" opacity="0.3" />
                                         <path
                                             d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                             fill="#000000" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.site_settings')</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion menu-active-bg">
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('settings.site.show') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.Site Settings')</span>
                                 </a>
                             </div>
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('settings.social.show') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">@lang('site.Social Settings')</span>
                                 </a>
                             </div>

                         </div>
                     </div>

                     <!-- end site settings -->
                 @endif

                 @if (auth()->user()->hasRole(['admin', 'kitchen', 'moderator']))
                     <!-- site settings -->

                     <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                 <span class="svg-icon svg-icon-2">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24" version="1.1">
                                         <path
                                             d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                             fill="#000000" opacity="0.3" />
                                         <path
                                             d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                             fill="#000000" />
                                     </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                             </span>
                             <span class="menu-title">@lang('site.ADs')</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <div class="menu-sub menu-sub-accordion menu-active-bg">
                             <!-- banners -->
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('banner.index') }}">
                                     <span class="menu-icon">
                                         <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                         <span class="svg-icon svg-icon-2">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                 <path opacity="0.25"
                                                     d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z"
                                                     fill="#12131A" />
                                                 <path
                                                     d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z"
                                                     fill="#12131A" />
                                                 <path opacity="0.25"
                                                     d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z"
                                                     fill="#12131A" />
                                                 <path
                                                     d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z"
                                                     fill="#12131A" />
                                             </svg>
                                         </span>
                                         <!--end::Svg Icon-->
                                     </span>
                                     <span class="menu-title">@lang('site.banners')</span>
                                 </a>
                             </div>
                             <!-- end banners -->

                             <!-- sliders -->
                             <div class="menu-item">
                                 <a class="menu-link" href="{{ route('slider.index') }}">
                                     <span class="menu-icon">
                                         <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                         <span class="svg-icon svg-icon-2">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
                                                 <path opacity="0.25"
                                                     d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z"
                                                     fill="#12131A" />
                                                 <path
                                                     d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z"
                                                     fill="#12131A" />
                                                 <path opacity="0.25"
                                                     d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z"
                                                     fill="#12131A" />
                                                 <path
                                                     d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z"
                                                     fill="#12131A" />
                                             </svg>
                                         </span>
                                         <!--end::Svg Icon-->
                                     </span>
                                     <span class="menu-title">@lang('site.sliders')</span>
                                 </a>
                             </div>
                             <!-- end sliders -->

                         </div>
                     </div>

                     <!-- end site settings -->
                 @endif
                 @if (auth()->user()->hasRole(['admin', 'kitchen', 'moderator']))
                 <!--end::Aside menu-->
                     <div class="menu-item">
                         <a class="menu-link" href="{{ route('messages.index') }}">
                                 <span class="menu-icon">
                                     <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
                                                        <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
                                                    </svg>
                                                </span>
                                     <!--end::Svg Icon-->
                                 </span>
                             <span class="menu-title">@lang('site.Messages')</span>
                         </a>
                     </div>
                    @endif

                    @if (auth()->user()->hasRole(['admin']))

                    <!-- site settings -->

                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                     <span class="menu-link">
                         <span class="menu-icon">
                             <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                             <span class="svg-icon svg-icon-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                      viewBox="0 0 24 24" version="1.1">
                                     <path
                                         d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                         fill="#000000" opacity="0.3" />
                                     <path
                                         d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                         fill="#000000" />
                                 </svg>
                             </span>
                             <!--end::Svg Icon-->
                         </span>
                         <span class="menu-title">@lang('site.Reports')</span>
                         <span class="menu-arrow"></span>
                     </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!-- reports -->
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('special_customers') }}">
                                 <span class="menu-icon">
                                     <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                     <span class="svg-icon svg-icon-2">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                              viewBox="0 0 24 24" fill="none">
                                             <path opacity="0.25"
                                                   d="M2 6.5C2 4.01472 4.01472 2 6.5 2H17.5C19.9853 2 22 4.01472 22 6.5V6.5C22 8.98528 19.9853 11 17.5 11H6.5C4.01472 11 2 8.98528 2 6.5V6.5Z"
                                                   fill="#12131A" />
                                             <path
                                                 d="M20 6.5C20 7.88071 18.8807 9 17.5 9C16.1193 9 15 7.88071 15 6.5C15 5.11929 16.1193 4 17.5 4C18.8807 4 20 5.11929 20 6.5Z"
                                                 fill="#12131A" />
                                             <path opacity="0.25"
                                                   d="M2 17.5C2 15.0147 4.01472 13 6.5 13H17.5C19.9853 13 22 15.0147 22 17.5V17.5C22 19.9853 19.9853 22 17.5 22H6.5C4.01472 22 2 19.9853 2 17.5V17.5Z"
                                                   fill="#12131A" />
                                             <path
                                                 d="M9 17.5C9 18.8807 7.88071 20 6.5 20C5.11929 20 4 18.8807 4 17.5C4 16.1193 5.11929 15 6.5 15C7.88071 15 9 16.1193 9 17.5Z"
                                                 fill="#12131A" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </span>
                                        <span class="menu-title">@lang('site.Special Customers')</span>
                                    </a>
                                </div>
                                <!-- end reports -->



                            </div>
                        </div>

                            <!-- end site settings -->
                @endif


                 <!-- other menue here -->
             </div>
             <!--end::Menu-->
         </div>
     </div>

     <!--end::Aside menu-->

     <!--begin::Footer-->
     <div class="aside-footer flex-column-auto" id="kt_aside_footer"></div>
     <!--end::Footer-->
 </div>
 <!--end::Aside-->
