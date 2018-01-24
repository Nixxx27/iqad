<nav class="navbar navbar-inverse navbar-fixed-top nav_opa" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="home">
                <b style="font-size:16px;color:#CF0053">

                    <span class="name">Quality Assurance Department |</span>
                </b>
                <span style="font-family:'century gothic'">IQAD System</span>
            </a>


        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/QADapps/home"><i class="fa fa-home"></i> Home</a></li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-search"></i> Findings
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/QADapps/create_new"><i class="fa fa-caret-right"></i> Create New</a></li>
                    <li><a href="/QADapps/overdue"><i class="fa fa-caret-right"></i> View Overdue
                            @if($overdue_count ==0)
                                <span></span></a>
                            @else
                                <span class="badge">{{ $overdue_count  }}</span></a>
                            @endif
                    </li>
                    <li><a href="/QADapps/home"><i class="fa fa-caret-right"></i> View All <span class="badge">{{ $all_findings  }}</span></a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog"></i> Settings
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/QADapps/department"><i class="fa fa-caret-right"></i> Department</a></li>
                    <li><a href="/QADapps/cause_category"><i class="fa fa-caret-right"></i> Cause Category</a></li>
                </ul>
            </li>

            <li><a href="/QADapps/about"><i class="fa fa-info-circle"></i> About</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i> Account
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-unlock"></i> Change Password</a></li>
                    <li><a onclick="return logout()" href="logout"><i class="fa fa-sign-out"></i>Log-Out</a></li>
                </ul>
            </li>
        </ul>
        <div class="pull-right">
            <h4 style="color: #cccccc;font-family:'century gothic'">
                {!! Html::image('public/images/skylogisticslogo.png','Property of SkyLogistics',array('height'=>'25px','width'=>'auto')) !!}
               <small style="  text-shadow: 0.5px 0.4px 0 rgb(119,117,117)">SkyLogistics Internal Quality Audit Database</small>
            </h4>
         </div>

        <div class="pull-right">
            {{--<span style="font-family:Arial;font-size:14px;color:#c9c5c5"><i class="fa fa-user"></i> welcome, {{ ucwords( Auth::user()->name) }}</span>--}}
        </div>
    </div>



</nav>
<hr style="margin-bottom:60px;border-top:none">