<!-- resources/views/child.blade.php -->

@extends('layouts.app')
@section('title', 'Homepage')
@section('header')
  @include("partials.main-header")
@endsection


@section('content')
 
    {{-- header --}}

    
    <header class="mainHeader">
        <div class="container">
                <div class="row">
                    <div class="mainHeaderContacts">
                        <i class="fa-solid fa-phone icons"></i>
                        <span>Call us between 8 AM - 10 PM /</span>
                        <a href="" class="mainNavLink">
                            6668 5555 8464
                        </a>
                    </div>

                    <div class="mainHeaderContacts">
                        <i class="fa-solid fa-headset icons"></i>
                        <span>Live Chat /</span>
                        <a href="" class="mainNavLink">
                            Chat with an Expert
                        </a>

                    </div>

                    <div class="mainHeaderContacts">
                        <i class="fa-solid fa-location-dot icons"></i>
                        <span>Click to discover</span>
                        <a href="" class="mainNavLink">
                            Locations
                        </a>
                    </div>

                    <div class="mainHeaderButton">
                        <div class="row">
                            <div class="col">
                                <span class="mainHeaderButtonText" >$ USD</span>
                                <i class="fa-solid fa-angle-down arrow" ></i>
                            </div>
    
                            <div class="col">
                                <span class="mainHeaderButtonText" >En</span>
                                <i class="fa-solid fa-angle-down arrow" ></i>
                            </div>
    
                            <div class="col">
                                <div class="mainHeaderBtnContainer">
                                    <i class="fa-regular fa-user user "></i>
                                    <button class="btn" type="submit">Login</button>
                                </div>
                                
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- endHeader --}}

    <!-- section -->
    <section class="mainSection">
        <div class="container">
                <div class="mainSectionSearchRow">
                 <div>
                    <img src="https://enovathemes.com/mobex/wp-content/themes/mobex/images/logo.svg" alt="mobexlogoimage" width="160" >
                 </div>
                 <div>
                    <div class="wrapper">
                        <div class="mainSectionSearchSelect">
                            <span>Select category</span>
                            <i class="fa-solid fa-angle-down arrow" ></i>
                        </div>
                        
                        <input type="text" placeholder="Enter a keyword or product SKU">
                        <div class="mainSectionSearchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                 </div>
                 <div class="mainSectionIcons">
                    <div class="mainSectionIconsRow">
                        <i class="fa-solid fa-right-left"></i>
                        <i class="fa-regular fa-heart"></i>
                        <div class="mainSectionIconsCart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div class="mainSectionIconsItem">
                                <span class="mainSectionIconsText">Cart</span>
                                <span class="mainSectionIconsCartItems">27 items</span>
                            </div>
                        </div>
                    </div>

                 </div>
                </div>
            </div>
        </div>
    </section>
   

   
     <section class="mainSectionCategory">
        <div class="container">
                <div class="mainSectionCategoryRow">
                    <div class="mainSectionCategoryWrapper">
                        <i class="fa-solid fa-bars"></i>
                        <span class="text">All categories</span>
                        <i class="fa-solid fa-angle-down arrow" ></i>
                    </div>
                    <ul>
                        <li class="active">Demos</li>
                        <li class="mainSectionCategoryNew">
                            <div>
                                <span>New!</span>
                            </div>
                            <span>Shop by brand</span>
                        </li>
                        <li>Shop by categories</li>
                        <li>Blog</li>
                        <li>Shop</li>
                        <li>Elements</li>
                        <li>Features</li>
                    </ul>

                    <div class="mainSectionCategoryBtn">
                        <i class="fa-solid fa-truck"></i>
                        <span class="text">My garage</span>
                        <i class="fa-solid fa-angle-down arrow" ></i>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
  
    <section class="mainShowCase">
        <div class="container">
            <div class="mainShowCaseRow">

                <div class="mainShowCaseCol">
                    <form action="" class="mainShowCaseForm">
                        <label>Select your car</label>
                        <div class="mainShowCaseWrapperForm">
                            <div class="mainShowCaseSelect">
                                <div class="mainShowCaseWrapper">
                                    <select>
                                        <option value="volvo">Make</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                                <div class="mainShowCaseWrapper">
                                    <select>
                                        <option value="volvo">Model</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                            </div>
    
                            <div class="mainShowCaseSelect">
                                <div class="mainShowCaseWrapper">
                                    <select>
                                        <option value="volvo">Year</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                                <div class="mainShowCaseWrapper">
                                    <select>
                                        <option value="volvo">Engine</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                            </div>
    
                            <div class="mainShowCaseSelect">
                                <div class="mainShowCaseWrapper">
                                    <select>
                                        <option value="volvo">Transmittion</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                                <div class="mainShowCaseWrapper">
                                    <select>
                                        <option value="volvo">Trim</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                      </select>
                                </div>
                            </div>

                            <div class="main-showcase__button">
                               <label for="">OR</label>
                               <input type="text" placeholder="Search by VIN">
                               <button type="button">
                                Search
                               </button>
                            </div>
                            
                            


                        </div>
                    </form>

                </div>
                <div class="mainShowCaseCol">
                    <div class="mainShowCaseMobil">
                        <h1>Mobil 1</h1>
                        <h2>Full Synthetic</h2>
                        <div class="mainShowCaseTagName">
                            <span>It's more than just oil.</span>
                            <span>It's liquid engineering.</span>
                        </div>
                       
                        <div class="mainshowcaseBtn">
                            <span>Shop now</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                
                <div class="mainShowCaseCol">
                     <div class="mainShowCaseWrapperImage">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/slider-asset-3.webp" alt="" srcset="" class="mainShowCasePercent" >
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/slider-asset-1.webp" alt="" srcset="" class="mainShowCaseBack" >
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/slider-asset-2.webp" alt="" class="mainShowCaseFont">
                     </div>
                        
                </div>
                  
                   
                <div class="mainShowCasePagination">
                    <i class="fa-solid fa-chevron-left"></i>
                    <div class="mainShowCaseDot">
                        <i class="fa-solid fa-circle active"></i>
                        <i class="fa-solid fa-circle"></i>
                        <i class="fa-solid fa-circle"></i>
                    </div>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
           
            </div>

              
            </div>
        </div>
    </section>
  
  
    <section class="mainSectionCategories">
        <div class="container">
            <div class="mainSectionCategoriesRow">
                <h2>Featured categories</h2>
                <div id="mainSectionCategoriesWrapper">
                </div>
            </div>
        </div>
    </section>



 
    <section class="mainSectionBrands">
        <div class="container">
            <div id="mainSectionBrandsRow">
            </div>
        </div>
    </section>

    <section class="mainSection_FeaturedProduct">
        <div class="container">
            <h2>Featured products in</h2>
            <div id="featureProduct_display">   
            </div>
            <div class="grid-container" id="gridContainerDisplay" >
        </div>
    </section>
   
    <section class="mainSection_BrandProduct">
        <div class="container">

            <div class="mainSection_BrandProduct__row">
              <div class="colLeft">
                <div class="topBrandTags">
                    <span>Top brands</span>
                </div>
                <h1>BRAKE SYSTEM</h1>
                <h2>WE'VE GOT YOU COVERED</h2>
                <span>Great Values. Always.</span>
                <div class="topLeftBrandbtn">
                    <span>Shop now</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
              </div>

              <div class="colRight">
                <img src="https://enovathemes.com/mobex/wp-content/uploads/banner9-img.webp" alt="">
              </div>
            </div>
           
            
        </div>
    </section>

     <section class="mainSection__FeaturedManufacturers">
        <div class="container">

            <h2>Featured manufacturers</h2>

            <div class="grid__container" id="grid_display">
                <div class="grid__item">
                    <img src="https://enovathemes.com/mobex/wp-content/themes/mobex/images//vehicle-logos/audi.webp" alt="" srcset="">
                </div>
            </div>

        </div>
    </section>

     <section class="mainSection__FeaturedBrands">
        <div class="container">

            <h2>Featured brands</h2>

            <div class="grid__FeatureContainer" id="featuredBand__display">
           
            </div>

        </div>
    </section>
 
    <section class="mainSection__ShowCase">
        <div class="container">
            <div class="ShowCase_boxes">
                <div class="showCase_Container">
                    <div class="showCaseItem">
                        <div class="showCase__Percentage">
                          <span>Up to 40% Off</span>
                        </div>
                        <h1>
                          READY FOR OFF ROAD
                        </h1>
                        <h2>
                          Confidence on any road!
                        </h2>
                    </div>
                    <div class="showCase__btn">
                        <span>Shop now</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
                
                <div class="showCaseItem_Img">
                    <img src="https://enovathemes.com/mobex/wp-content/uploads/banner10-img.webp" alt="tireImage">
                </div>
            </div>

            <div class="ShowCase_boxes" ">
                <div class="showCase_Container">
                    <div class="showCaseItem">
                        <div class="showCase__Percentage_brands">
                          <span>Top Brands</span>
                        </div>
                        <h1>
                          ENGINE ESSENTIALS
                        </h1>
                        <h2>
                          Maximize & Maintain
                        </h2>
                    </div>
                    <div class="showCase__btn">
                        <span>Shop now</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
                
                <div class="showCaseItem_Img">
                    <img src="https://enovathemes.com/mobex/wp-content/uploads/banner11-img.webp" alt="tireImage">
                </div>
            </div>

        </div>
    </section>
  
    <section class="mainSection__Deals">
        <div class="container">
           <div class="mainSection_TopHeader">
            <div class="mainSection__TopDeals">
                <h2>Best Deals of the week!</h2>
                <div class="timer">
                    <div class="timer__item">
                        <span>10</span>
                    </div>
                    <span>:</span>
                    <div class="timer__item">
                        <span>02</span>
                    </div>
                    <span>:</span>
                    <div class="timer__item">
                        <span>41</span>
                    </div>
                    <span>:</span>
                    <div class="timer__item">
                        <span>50</span>
                    </div>
                </div>
               </div>
               <div class="mainSection__Pagination">
                <i class="fa-solid fa-chevron-left"></i>
                <i class="fa-solid fa-chevron-right"></i>
               </div>
    
           </div>
          

           <div class="mainSection__DealsContainer" id="display__weakdeals">
                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>

                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>

                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>

                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>

                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>

                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>

                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>

                <div class="flex__container">
                    <div class="flexleft_container">
                        <img src="https://enovathemes.com/mobex/wp-content/uploads/product-105-img-1-300x300.webp" alt="">
                        <div class="flex__icons">
                            <i class="fa-regular fa-heart"></i>
                            <i class="fa-solid fa-right-left"></i>
                            <i class="fa-regular fa-eye"></i>
                        </div>
                    </div>
                    <div class="flexright_container">
                        <h2>Yato yt-04382 screwdriver bit</h2>
                        <div class="ratings">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="prices">
                            <span class="main_price">$1.85</span>
                            <span class="main_current_price">$1.85</span>
                        </div>
                        
                        <div class="flexright_btn">
                            <span>Add to cart</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="topButton">
                        <div class="leftButton">
                            Sale
                        </div>
                        <div class="rightButton">
                            New!
                        </div>
                    </div>
                </div>
           </div>

        </div>
    </section>
   {{-- endsection --}}

    <!-- <div class="pagination">
        <button id="prevPageBtn">&lt;</button>
        <span id="pageNumbers"></span>
        <button id="nextPageBtn">&gt;</button>
    </div>

    <ul id="itemList">
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
        <li>Item 4</li>
        <li>Item 5</li>
        <li>Item 6</li>
        <li>Item 7</li>
        <li>Item 8</li>
        <li>Item 9</li>
        <li>Item 10</li>
    </ul> -->

@endsection
