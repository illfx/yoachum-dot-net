@extends('bootstrap-4.template')
@section('content')
<div class="container">
    <article class="psy-article">

        @include('articles.header')

        <section>

            <p>
                Ok! So, it's not the first man on the moon, but it will do.
                The content of the first article is mostly static content found in a corresponding blade template
                file rendered by the ArticleController. A blade template view will accompany each article.

                The content in this Article is static.

                An Article is comprised of a Blade Template view.

                Articles are Blade php files served by the ArticleController.

                The view property of an Article describes which view belongs to that article.
            </p>


            <b>Article Model</b>
            <ul>
                <li>id <small>increments</small></li>
                <li>title <small>string</small></li>
                <li>view <small>string</small></li>
                <li>author <small>user</small></li>
                <li>created_at <small>timestamps</small></li>
                <li>updated_at <small>timestamps</small></li>
                <li>deleted_at <small>use softDeletes;</small></li>
            </ul>
        </section>

        <section>
            <h3>Bootstrap 4</h3>
            <p>bootstrapped for ui/ux responsive articles</p>

            <div>
                <h5>Inline & Block Code</h5>
                <p>
                    format inline and block code with &lt;code&gt;&lt;/code&gt; and &lt;pre&gt;&lt;/pre&gt;
                </p>
            </div>

            <div>
                <h5>Variables</h5>
                <p>
                    format variables with Bootstrap 4 using &lt;var&gt;&lt;/var&gt;
                </p>
            </div>

            <div>
                <h5>User Input</h5>
                <p>
                    format user input with Bootstrap 4 using &lt;kbd&gt;&lt;/kbd&gt;
                </p>
            </div>
            <div>
                <h5>Sample Output</h5>
                <p>
                    format sample output with Bootstrap 4 using &lt;samp&gt;&lt;/samp&gt;
                </p>
            </div>
            <div>
                <p>The <code>&lt;code&gt;&lt;/code&gt;</code> tags can be used to wrap inline code.</p>
            </div>

            <div>
                For example, <code>&lt;section&gt;</code> should be wrapped as inline.
            </div>



            <div>
                <p>The <code>&lt;samp&gt;&lt;/samp&gt;</code> still relies on vacuum tubes and punch cards</p>
                <samp>This text is meant to be treated as sample output from a computer program.</samp>
            </div>



            </body>


        </section>

        <footer>
            <p>
                The Footclan Biotch
            </p>
        </footer>
    </article>



</div>
@endsection