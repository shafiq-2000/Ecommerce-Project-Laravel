@extends('backend.layouts.master')
@section('main-content')
    <div class="row-fluid">

        <div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
            <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
            <div class="number">854<i class="icon-arrow-up"></i></div>
            <div class="title">visits</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox green" onTablet="span6" onDesktop="span3">
            <div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
            <div class="number">123<i class="icon-arrow-up"></i></div>
            <div class="title">sales</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
            <div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
            <div class="number">982<i class="icon-arrow-up"></i></div>
            <div class="title">orders</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
            <div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
            <div class="number">678<i class="icon-arrow-down"></i></div>
            <div class="title">visits</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>

    </div>
    <div class="row-fluid">

        <a class="quick-button metro yellow span2">
            <i class="icon-group"></i>
            <p>Users</p>
            <span class="badge">237</span>
        </a>
        <a class="quick-button metro red span2">
            <i class="icon-comments-alt"></i>
            <p>Comments</p>
            <span class="badge">46</span>
        </a>
        <a class="quick-button metro blue span2">
            <i class="icon-shopping-cart"></i>
            <p>Orders</p>
            <span class="badge">13</span>
        </a>
        <a class="quick-button metro green span2">
            <i class="icon-barcode"></i>
            <p>Products</p>
        </a>
        <a class="quick-button metro pink span2">
            <i class="icon-envelope"></i>
            <p>Messages</p>
            <span class="badge">88</span>
        </a>
        <a class="quick-button metro black span2">
            <i class="icon-calendar"></i>
            <p>Calendar</p>
        </a>

        <div class="clearfix"></div>

    </div>
    </div>
    </div>
    </div>
@endsection
