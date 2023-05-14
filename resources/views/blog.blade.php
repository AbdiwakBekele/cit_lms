@extends('layouts.studentLayout')

@section('title', 'Blog | CTI')


@section('content')

<!-- heading banner -->
<section class="heading-banner text-white " style="background:#16416E">
    <div class="container holder">
        <div class="align">
        </div>
    </div>
</section>
<!-- breadcrumb nav -->
<nav class="breadcrumb-nav">
    <div class="container">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Blog</li>
        </ol>
    </div>
</nav>
<!-- two columns -->
<div id="two-columns" class="container">
    <div class="row">
        <!-- content -->
        <section id="content" class="col-xs-12 col-md-9">
            <!-- blogPost -->
            <article class="blogPost">
                <time datetime="2011-01-12" class="timeStamp font-lato text-center text-uppercase">
                    <strong class="date fw-normal element-block">24</strong>
                    <span class="element-block">mar</span>
                    <span class="element-block">2023</span>
                </time>
                <div class="aligncenter">
                    <img src=" {{ asset('images/B1Artboard 1.jpg') }} " alt="image description">
                </div>
                <h1>The Difference between Social Media Marketing and Digital Marketing</h1>
                <!-- postActionsInfo -->
                <ul class="list-unstyled postActionsInfo text-uppercase">
                    <li><a href="#"><i class="far fa-user icn"></i> by CTI</a></li>
                    <li><a href="#"><i class="far fa-folder icn"></i> Marketing, Advanced</a></li>
                    <li><a href="#"><i class="far fa-comment icn"></i> 3 Comments</a></li>
                </ul>
                <p>In this blog post, we’ll look at the five main differences between social media
                    marketing and digital marketing so that you can choose the best strategy for your
                    business.</p>
                <a href="#" class="btn btn-default text-uppercase">Read More</a>
            </article>
            <!-- blogPost -->
            <article class="blogPost">
                <time datetime="2011-01-12" class="timeStamp font-lato text-center text-uppercase">
                    <strong class="date fw-normal element-block">26</strong>
                    <span class="element-block">mar</span>
                    <span class="element-block">2023</span>
                </time>
                <div class="aligncenter">
                    <img src=" {{ asset('images/B1Artboard 2.jpg') }} " alt="image description">
                </div>
                <h1>Digital Marketing in Ethiopia</h1>
                <!-- postActionsInfo -->
                <ul class="list-unstyled postActionsInfo text-uppercase">
                    <li><a href="#"><i class="far fa-user icn"></i> by CTI</a></li>
                    <li><a href="#"><i class="far fa-folder icn"></i> Ethiopia, Digital Marketing</a>
                    </li>
                    <li><a href="#"><i class="far fa-comment icn"></i> 4 Comments</a></li>
                </ul>
                <p>Digital marketing is quickly becoming an essential part of doing business in
                    Ethiopia. This is because of the rising popularity of the internet and the
                    increasing number of people who have access to it – As of now, approximatley 50% of
                    Ethiopian businesses have some form of an online presence. With the rise of digital
                    marketing, businesses in Ethiopia can reach new audiences, increase brand awareness,
                    and build relationships with their customers.</p>
                <a href="#" class="btn btn-default text-uppercase">Read More</a>
            </article>
            <!-- blogPost -->
            <article class="blogPost">
                <time datetime="2011-01-12" class="timeStamp font-lato text-center text-uppercase">
                    <strong class="date fw-normal element-block">28</strong>
                    <span class="element-block">mar</span>
                    <span class="element-block">2023</span>
                </time>
                <div class="aligncenter">
                    <img src=" {{ asset('images/B1Artboard 3.jpg') }} " alt="image description">
                </div>
                <h1>What are Community Guidelines?</h1>
                <!-- postActionsInfo -->
                <ul class="list-unstyled postActionsInfo text-uppercase">
                    <li><a href="#"><i class="far fa-user icn"></i> by CTI</a></li>
                    <li><a href="#"><i class="far fa-folder icn"></i> Community, Digital Marketing</a>
                    </li>
                    <li><a href="#"><i class="far fa-comment icn"></i>2 Comments</a></li>
                </ul>
                <p>Understanding the community guidelines of social media platforms is essential for
                    users to maintain their accounts and protect their reputation. Community guidelines
                    are the rules and regulations that different social media companies have set up to
                    ensure a safe, respectful and productive environment. Not adhering to the guidelines
                    can result in account suspensions, bans, or even deletion.</p>
                <a href="#" class="btn btn-default text-uppercase">Read More</a>
            </article>

            <nav aria-label="Page navigation">
                <!-- pagination -->
                <ul class="pagination">
                    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">2</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">›</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <!-- sidebar -->
        <aside class="col-xs-12 col-md-3" id="sidebar">
            <!-- widget search -->
            <section class="widget widget_search">
                <!-- search form -->
                <form action="#" class="search-form">
                    <fieldset>
                        <input placeholder=" Search…" class="form-control" name="s" type="search">
                        <button type="button" class="fas fa-search"><span class="sr-only">search</span></button>
                    </fieldset>
                </form>
            </section>
            <!-- widget popular posts -->
            <section class="widget widget_popular_posts">
                <h3>Latest Posts</h3>
                <!-- widget cources list -->
                <ul class="widget-cources-list list-unstyled">
                    <li>
                        <a href="/blog">
                            <div class="alignleft">
                                <img src="{{ asset('images/B1Artboard 1.jpg') }} " alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>The Difference Between Social Media Marketing And Digital Marketing
                                </h4>
                                <time datetime="2011-01-12" class="text-gray element-block">Mar
                                    24,2023</time>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/blog">
                            <div class="alignleft">
                                <img src="{{ asset('images/B1Artboard 2.jpg') }} " alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>Digital Marketing In Ethiopia</h4>
                                <time datetime="2011-01-12" class="text-gray element-block">Mar
                                    26,2023</time>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="blog-single.html">
                            <div class="alignleft">
                                <img src="{{ asset('images/B1Artboard 3.jpg') }} " alt="image description">
                            </div>
                            <div class="description-wrap">
                                <h4>What Are Community Guidelines?</h4>
                                <time datetime="2011-01-12" class="text-gray element-block">Mar
                                    28,2023</time>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>

            <!-- widget categories -->
            <section class="widget widget_categories">
                <h3>Categories</h3>
                <ul class="list-unstyled text-capitalize font-lato">
                    <li class="cat-item cat-item-1"><a href="#">Business</a></li>
                    <li class="cat-item active cat-item-2"><a href="#">Design</a></li>
                    <li class="cat-item cat-item-3"><a href="#">Programing Language</a></li>
                    <li class="cat-item cat-item-4"><a href="#">Photography</a></li>
                    <li class="cat-item cat-item-5"><a href="#">Language</a></li>
                    <li class="cat-item cat-item-6"><a href="#">Life Style</a></li>
                    <li class="cat-item cat-item-7"><a href="#">IT &amp; Software</a></li>
                </ul>
            </section>

            <!-- widget tags -->
            <nav class="widget widget_tags">
                <h3>Tags</h3>
                <!-- tag clouds -->
                <ul class="list-unstyled tag-clouds font-lato">
                    <li><a href="#">Future</a></li>
                    <li><a href="#">Science</a></li>
                    <li><a href="#">Coding</a></li>
                    <li><a href="#">Education</a></li>
                    <li><a href="#">Technology</a></li>
                </ul>
            </nav>

            <!-- widget archives -->
            <section class="widget widget_archives">
                <h3>Archives</h3>
                <select data-placeholder="Select Month" class="chosen-select-no-single">
                    <option value="0">Select Month</option>
                    <option value="0">Select Month</option>
                    <option value="0">Select Month</option>
                </select>
            </section>
        </aside>
    </div>
</div>

@endsection