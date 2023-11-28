@extends('layout.master')
@section('title')
    {{ __('Screen Reader Access') }}
@endsection
@section('content')
<section class="breadcrumb">
        <div class="page-breadcrumb">
            <div class="breadcrumb-img">
                <img src="{{ asset('assets/images/bredcrumb.jpg') }}" alt="" />
            </div>
            <div class="breadcrumb-title">
                <h3 class="title">Screen Reader Access</h3>
            </div>
        </div>
    </section>
    <div class="main-body">
        <div class="container breadcrumbs-link">
            <div class="breadcrumbs-link-text">
                <ul>
                    <li>
                        <a class="active" href="{{ route('/') }}" tabindex="0">Home </a>
                    </li>
                    <li>Screen Reader Access</li>
                </ul>
            </div>
        </div>
        <section class="master bg-grey">
            <div class="container">
                <div class="news-tab common-tab side-tab1">
                    <div class="row">

                        <div class="col ">
                            <div class="" id="about">
                                <h1>
                                    Screen Reader Access
                                </h1>
                                <p class="desc">
                                    he Rashtriya Ayurveda Vidyapeeth An autonomous organisation under Ministry of AYUSH,
                                    Govt. of India website complies with World Wide Web Consortium (W3C) Web Content
                                    Accessibility Guidelines (WCAG) 2.0 level AA. This will enable people with visual
                                    impairments access the website using assistive technologies, such as screen readers.
                                    The information of the website is accessible with different screen readers, such as
                                    JAWS, NVDA, SAFA, Supernova and Window-Eyes.</p>
                                <p class="desc">
                                    Following table lists the information about different screen readers:</p>
                                </p>

                                <table  title="Information related to the various screen readers">
                                    <tbody>
                                        <tr>
                                            <th>Screen Reader</th>
                                            <th>Website</th>
                                            <th>Free / Commercial</th>
                                        </tr>
                                        <tr>
                                            <td>Screen Access For All (SAFA)</td>
                                            <td><a href="http://www.nabdelhi.org/NAB_SAFA.htm" target="_blank"
                                                    title="External website that opens in a new window"
                                                    class="ext">http://www.nabdelhi.org/NAB_SAFA.htm (External website
                                                    that opens in a new window)<span class="ext"><span
                                                            class="element-invisible"> (link is
                                                            external)</span></span></a></td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td>Non Visual Desktop Access (NVDA)</td>
                                            <td><a href="http://www.nvda-project.org/" target="_blank"
                                                    title="External website that opens in a new window"
                                                    class="ext">http://www.nvda-project.org/ (External website that
                                                    opens in a new window)<span class="ext"><span
                                                            class="element-invisible"> (link is
                                                            external)</span></span></a></td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td>System Access To Go</td>
                                            <td><a href="http://www.satogo.com/" target="_blank"
                                                    title="External website that opens in a new window"
                                                    class="ext">http://www.satogo.com/ (External website that opens in a
                                                    new window)<span class="ext"><span class="element-invisible"> (link
                                                            is external)</span></span></a></td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td>Thunder</td>
                                            <td><a href="http://www.screenreader.net/index.php?pageid=2" target="_blank"
                                                    title="External website that opens in a new window"
                                                    class="ext">http://www.screenreader.net/index.php?pageid=2 (External
                                                    website that opens in a new window)<span class="ext"><span
                                                            class="element-invisible"> (link is
                                                            external)</span></span></a></td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td>Hal</td>
                                            <td><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=5"
                                                    target="_blank" title="External website that opens in a new window"
                                                    class="ext">http://www.yourdolphin.co.uk/productdetail.asp?id=5
                                                    (External website that opens in a new window)<span class="ext"><span
                                                            class="element-invisible"> (link is
                                                            external)</span></span></a></td>
                                            <td>Commercial</td>
                                        </tr>
                                        <tr>
                                            <td>JAWS</td>
                                            <td><a href="http://www.freedomscientific.com/jaws-hq.asp" target="_blank"
                                                    title="External website that opens in a new window"
                                                    class="ext">http://www.freedomscientific.com/jaws-hq.asp (External
                                                    website that opens in a new window)<span class="ext"><span
                                                            class="element-invisible"> (link is
                                                            external)</span></span></a></td>
                                            <td>Commercial</td>
                                        </tr>
                                        <tr>
                                            <td>Supernova</td>
                                            <td><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=1"
                                                    target="_blank" title="External website that opens in a new window"
                                                    class="ext">http://www.yourdolphin.co.uk/productdetail.asp?id=1
                                                    (External website that opens in a new window)<span class="ext"><span
                                                            class="element-invisible"> (link is
                                                            external)</span></span></a></td>
                                            <td>Commercial</td>
                                        </tr>
                                        <tr>
                                            <td>Window-Eyes</td>
                                            <td><a href="http://www.gwmicro.com/Window-Eyes/" target="_blank"
                                                    title="External website that opens in a new window"
                                                    class="ext">http://www.gwmicro.com/Window-Eyes/ (External web<span
                                                        class="ext"><span class="element-invisible"> (link is
                                                            external)</span></span></a></td>
                                            <td>Commercial</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection