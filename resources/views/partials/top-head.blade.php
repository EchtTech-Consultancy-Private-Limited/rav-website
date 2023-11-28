<div class="header-top-content">
                  <div class="header-top-left">
                     <ul>
                        <li>
                           <a href="{{ route('site-map') }}">
                               @if (Session::get('locale') == 'en')
                                   {{ __('messages.sitemap') }}
                               @else
                                   {{ __('messages.sitemap') }}
                               @endif
                           </a>
                       </li>
                       <li>
                           <a href="#about-us">
                               @if (Session::get('locale') == 'en')
                                   {{ __('messages.Skip-content') }}
                               @else
                                   {{ __('messages.Skip-content') }}
                               @endif
                           </a>
                       </li>
                       <li>
                           <a href="{{ route('screen-reader-access') }}">
                               @if (Session::get('locale') == 'en')
                                   {{ __('messages.Screen-Access') }}
                               @else
                                   {{ __('messages.Screen-Access') }}
                               @endif
                           </a>
                       </li>
                     </ul>
                  </div>
                  <div class="header-top-right">
                     <ul>
                        <li>
                           <div class="d-flex">
                              <button class="text-increment-btn" onclick="decreaseFontSize()">A-</button>
                              <button class="text-increment-btn" onclick="normaltext()">A</button>
                              <button class="text-increment-btn" onclick="increaseFontSize()">A+</button>
                           </div>
                        </li>
                        <li>
                           
                           <div class="select-wrap">
                              <img src="assets/images/globe.svg" alt="globe" class="img-fluid">
                              <select class="form-select language" id="language-eng" onchange="setlang(value);">
                                  <option value="en" @if (Session::get('locale') == 'en') selected @endif>
                                      English</option>
                                  <option value="hi" @if (Session::get('locale') == 'hi') selected @endif>
                                      हिन्दी</option>
                              </select>
                          </div>
                        </li>
                        <li>
                           <div class="theme-toggle">
                              <label class="switch">
                              <input
                                 type="checkbox"
                                 class="switch-input"
                                 id="mode"
                                 onclick="setTheme()"
                                 >
                              <span data-on="On" data-off="Off" class="switch-label"></span>
                              <span class="switch-handle"></span>
                              </label>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <button
                     class="navbar-toggler"
                     type="button"
                     data-bs-toggle="collapse"
                     data-bs-target="#navbarContent"
                     aria-controls="navbarContent"
                     aria-expanded="false"
                     aria-label="Toggle navigation"
                     >
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  </button>
               </div>