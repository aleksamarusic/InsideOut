
<!--
Autori:
    Aleksa Marusic
    Marija Kostic
-->
<!doctype html>
<html lang=''>

<head>
    <meta charset='utf-8'>
    <link rel='apple-touch-icon' sizes='76x76' href='<?php echo base_url() ?>assets/img/apple-icon.png'>
    <link rel='icon' type='image/png' href='<?php echo base_url() ?>assets/img/favicon.png'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />

    <meta content='width=device-width, initial-scale=1, user-scalable=no' name='viewport'>

    <title>Inside Out</title>

    <!-- Google icon -->
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>

    <!-- Bootstrap css -->
    <link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>assets/css/bootstrap.min.css'>

    <!-- Propeller css -->
    <link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>assets/css/propeller.min.css'>

    <!-- Propeller theme css-->
    <link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>themes/css/propeller-theme.css' />

    <!-- Propeller admin theme css-->
    <link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>themes/css/propeller-admin.css'>

    <script language="javascript">
        function registerDelete(companyName){
            localStorage.setItem("delete_name", companyName);
            //document.cookie = "delete_name="+companyName;
        }

        function sendRequestDelete(){
            var company = localStorage.getItem("delete_name");
            var action = '<?php echo base_url()."index.php/Admin/removeCompany/"?>' + company;
            document.body.innerHTML += '<form id="dynForm" method="post">&nbsp;</form>';
            document.getElementById("dynForm").action = action;
            document.getElementById("dynForm").submit();
        }
    </script>
</head>

<body style='background: #4acc8e'>
    <!--Start Nav bar -->
    <nav class='navbar navbar-default navbar-fixed-top pmd-navbar primary-navbar'>
        <div class='container'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class='navbar-header'>
                <button class='pmd-ripple-effect navbar-toggle pmd-navbar-toggle' type='button'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' title='' href='#intro'>
                    <h3 style='color:#4acc8e;'>Inside Out</h3>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id='bs-example-navbar-collapse-1' class='collapse navbar-collapse pmd-navbar-sidebar'>

                <!-- Navbar Right -->
                <ul class='nav navbar-nav navbar-right'>
                    <li>
                        <a href=<?php echo base_url()."index.php/Admin/signout"?>>Sign out</a>
                    </li>
                </ul>
                <!-- End Navbar Right -->
            </div>
        </div>
        <div class='pmd-sidebar-overlay'></div>
    </nav>
    <!-- End Navbar -->

    <!--content area start-->
    <div id='content' class='pmd-content inner-page content-area' style='padding-top: 100px'>
        <div class='container'>


            <div class='row'>


                <!--Statistics-->
                <div class='col-xs-12 col-sm-12 col-md-12'>
                    <div class='pmd-card pmd-z-depth statistics-content'>
                        <div class='pmd-card-title'>
                            <div class='media-left set-svg'>
                                <span class='service-icon img-circle bg-fill-green'>
                                    <svg version='1.1' id='Layer_1' x='0px' y='0px' width='36px' height='26.25px' viewBox='279.765 332.782 36 26.25' enable-background='new 279.765 332.782 36 26.25'
                                        xml:space='preserve'>
                                        <g>
                                            <path fill='#FFFFFF' d='M312.318,332.782c-1.928,0-3.485,1.558-3.485,3.485c0,0.89,0.334,1.706,0.89,2.336l-6.117,8.898
                            c-0.371-0.112-0.742-0.186-1.148-0.186c-0.557,0-1.077,0.111-1.521,0.334l-4.82-4.932c0.296-0.519,0.445-1.075,0.445-1.706
                            c0-1.927-1.557-3.485-3.485-3.485c-1.928,0-3.485,1.558-3.485,3.485c0,0.853,0.296,1.595,0.779,2.225l-6.155,8.972
                            c-0.296-0.074-0.63-0.148-0.964-0.148c-1.928,0-3.485,1.558-3.485,3.486c0,1.927,1.557,3.485,3.485,3.485
                            c1.928,0,3.485-1.558,3.485-3.485c0-0.89-0.333-1.706-0.889-2.336l6.118-8.935c0.333,0.111,0.742,0.185,1.112,0.185
                            c0.593,0,1.187-0.148,1.669-0.445l4.782,4.931c-0.334,0.556-0.556,1.187-0.556,1.854c0,1.927,1.556,3.485,3.485,3.485
                            c1.927,0,3.484-1.558,3.484-3.485c0-0.816-0.297-1.595-0.78-2.188l6.155-9.009c0.296,0.074,0.63,0.148,0.964,0.148
                            c1.93,0,3.485-1.558,3.485-3.486C315.765,334.339,314.244,332.782,312.318,332.782z' />
                                        </g>
                                    </svg>
                                </span>
                            </div>
                            <div class='media-body media-middle'>
                                <h2 class='pmd-card-title-text typo-fill-secondary'>Statistics</h2>
                            </div>
                        </div>
                        <div class='pmd-card-body statistics text-center'>
                            <ul class='list-group list-inline'>
                                <li>
                                    <div class='statistic-img-circle'>
                                        <svg version='1.1' id='Layer_1' x='0px' y='0px' width='30px' height='30px' viewBox='281.64 330.535 32 32' enable-background='new 281.64 330.535 32 32'
                                            xml:space='preserve'>
                                            <g>
                                                <polygon fill='#40AC45' points='296.29,330.535 296.29,353.696 288.187,345.594 286.182,347.599 297.762,359.18 309.139,347.599 
                                307.093,345.594 299.154,353.655 299.154,330.535 	' />
                                                <polygon fill='#40AC45' points='313.64,354.72 310.776,354.72 310.776,359.589 284.504,359.589 284.504,354.72 281.64,354.72 
                                281.64,362.454 313.64,362.454 	' />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class='pmd-display2'>+1100</div>
                                    <div class='source-semibold typo-fill-secondary'>Downloads</div>
                                </li>
                                <li>
                                    <div class='statistic-img-circle'>
                                        <svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
                                            width='34px' height='17.711px' viewBox='280.699 426.316 34 17.711' enable-background='new 280.699 426.316 34 17.711'
                                            xml:space='preserve'>
                                            <g>
                                                <path fill='#40AC45' d='M297.696,444.027c-9.155,0-16.394-7.752-16.698-8.085c-0.397-0.434-0.397-1.106,0-1.54
                                c0.304-0.333,7.543-8.086,16.698-8.086c9.156,0,16.402,7.753,16.706,8.086c0.397,0.434,0.397,1.106,0,1.54
                                C314.09,436.275,306.852,444.027,297.696,444.027z M283.449,435.169c2.018,1.887,7.702,6.588,14.247,6.588
                                c6.559,0,12.236-4.693,14.247-6.581c-2.018-1.888-7.702-6.581-14.247-6.581C291.137,428.588,285.46,433.281,283.449,435.169z'
                                                />
                                                <path fill='#40AC45' d='M297.696,440.368c-2.864,0-5.2-2.336-5.2-5.199c0-2.864,2.336-5.2,5.2-5.2c0.629,0,1.135,0.506,1.135,1.136
                                c0,0.629-0.506,1.135-1.135,1.135c-1.613,0-2.929,1.316-2.929,2.93c0,1.612,1.316,2.929,2.929,2.929s2.929-1.31,2.929-2.929
                                c0-0.63,0.506-1.136,1.135-1.136c0.63,0,1.136,0.506,1.136,1.136C302.896,438.039,300.56,440.368,297.696,440.368z'
                                                />
                                                <circle fill='#40AC45' cx='297.696' cy='435.024' r='1.685' />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class='pmd-display2'>+930</div>
                                    <div class='source-semibold typo-fill-secondary'>Visits</div>
                                </li>
                                <li>
                                    <div class='statistic-img-circle'>
                                        <svg version='1.1' id='Layer_1' xmlns:inkscape='http://www.inkscape.org/namespaces/inkscape' xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns#'
                                            xmlns:cc='http://creativecommons.org/ns#' xmlns:svg='http://www.w3.org/2000/svg'
                                            xmlns:sodipodi='http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd' xmlns:dc='http://purl.org/dc/elements/1.1/'
                                            xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px'
                                            y='0px' width='32px' height='28.541px' viewBox='281.64 332.265 32 28.541' enable-background='new 281.64 332.265 32 28.541'
                                            xml:space='preserve'>
                                            <g transform='translate(0,-952.36218)'>
                                                <path fill='#40AC45' d='M297.64,1284.627c-4.044,0-7.352,3.307-7.352,7.351c0,4.045,3.307,7.352,7.352,7.352
                                c4.045,0,7.352-3.307,7.352-7.352C304.991,1287.934,301.685,1284.627,297.64,1284.627z M297.64,1287.222
                                c2.643,0,4.757,2.114,4.757,4.757s-2.114,4.757-4.757,4.757s-4.757-2.114-4.757-4.757S294.997,1287.222,297.64,1287.222z
                                 M297.64,1300.195c-4.283,0-8.164,1.021-11.067,2.743s-4.933,4.255-4.933,7.203v1.73c0,0.716,0.581,1.297,1.297,1.297h29.406
                                c0.716,0,1.297-0.581,1.297-1.297v-1.73c0-2.948-2.028-5.48-4.933-7.203C305.804,1301.215,301.923,1300.195,297.64,1300.195z
                                 M297.64,1302.789c3.862,0,7.332,0.948,9.743,2.378c2.411,1.43,3.662,3.235,3.662,4.973v0.433h-26.811v-0.433
                                c0-1.737,1.251-3.542,3.662-4.973C290.308,1303.737,293.778,1302.789,297.64,1302.789z' />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class='pmd-display2'>570</div>
                                    <div class='source-semibold typo-fill-secondary'>New users</div>
                                </li>
                                <li>
                                    <div class='statistic-img-circle'>
                                        <svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
                                            width='32px' height='32px' viewBox='281.64 320.756 32 32' enable-background='new 281.64 320.756 32 32'
                                            xml:space='preserve'>
                                            <g transform='matrix( 1, 0, 0, 1, 0,0) '>
                                                <g>
                                                    <g id='a'>
                                                        <path fill='#40AC45' d='M308.947,348.063c3.129-3.117,4.693-6.886,4.693-11.307c0-4.433-1.564-8.208-4.693-11.325
                                        c-3.117-3.117-6.886-4.675-11.307-4.675c-4.433,0-8.208,1.559-11.324,4.675c-1.387,1.387-2.466,2.904-3.236,4.551
                                        c-0.307,0.655-0.567,1.331-0.782,2.027c-0.438,1.488-0.658,3.07-0.658,4.747c0,4.42,1.559,8.19,4.676,11.307
                                        c0.913,0.917,1.879,1.699,2.897,2.347c2.483,1.564,5.292,2.346,8.427,2.346c3.126,0,5.923-0.782,8.391-2.346
                                        C307.062,349.762,308.033,348.979,308.947,348.063 M297.64,323.103c3.769,0,6.98,1.333,9.636,4c2.666,2.655,4,5.873,4,9.653
                                        c0,3.769-1.334,6.98-4,9.636c-2.655,2.667-5.867,4-9.636,4c-3.781,0-6.999-1.333-9.653-4c-2.667-2.655-4-5.867-4-9.636
                                        c0-1.696,0.267-3.278,0.8-4.747c0.257-0.702,0.571-1.377,0.942-2.027c0.605-1.024,1.358-1.984,2.258-2.88
                                        C290.641,324.437,293.859,323.103,297.64,323.103 M288.698,338.996c0.273,2.868,1.713,5.174,4.32,6.916
                                        c1.529,0.936,3.069,1.387,4.622,1.351c1.553,0.036,3.088-0.415,4.604-1.351c2.643-1.766,4.089-4.071,4.338-6.916
                                        c0.023-0.486-0.332-0.64-1.066-0.462l-2.524,0.498c-1.624,0.45-3.408,0.675-5.352,0.675c-1.956,0-3.745-0.226-5.369-0.675
                                        l-2.507-0.498C289.041,338.356,288.686,338.51,288.698,338.996 M294.724,335.138l0.64,0.925c0.355,0.438,0.533,0.213,0.533-0.676
                                        c0.012-1.221-0.213-2.228-0.676-3.022c-0.533-0.83-1.114-1.239-1.742-1.227h-0.018c-0.64-0.012-1.227,0.397-1.76,1.227
                                        c-0.462,0.794-0.688,1.801-0.676,3.022c0,0.889,0.178,1.114,0.533,0.676l0.64-0.925c0.32-0.533,0.741-0.77,1.262-0.71h0.018
                                        C293.99,334.368,294.405,334.605,294.724,335.138 M300.058,332.365c-0.463,0.794-0.688,1.801-0.676,3.022
                                        c0,0.889,0.172,1.114,0.516,0.676l0.64-0.925c0.332-0.533,0.753-0.77,1.263-0.71h0.018c0.51-0.06,0.931,0.178,1.263,0.71
                                        l0.622,0.925c0.355,0.438,0.533,0.213,0.533-0.676c0.012-1.221-0.214-2.228-0.676-3.022c-0.521-0.83-1.103-1.239-1.742-1.227
                                        H301.8C301.159,331.126,300.579,331.536,300.058,332.365z' />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class='pmd-display2'>+900</div>
                                    <div class='source-semibold typo-fill-secondary'>Happy users</div>
                                </li>
                                <li>
                                    <div class='statistic-img-circle'>
                                        <svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
                                            width='32px' height='28.196px' viewBox='281.64 306.578 32 28.196' enable-background='new 281.64 306.578 32 28.196'
                                            xml:space='preserve'>
                                            <g>
                                                <path fill='#40AC45' d='M311.166,317.292c-1.711-0.186-3.422-0.297-5.059-0.409c-1.562-0.111-3.124-0.223-4.761-0.372l1.004-2.009
                                l0.037-0.111c0.596-2.12,0.224-4.389-1.004-6.211l-0.483-0.744c-0.372-0.558-1.004-0.893-1.674-0.855
                                c-0.669,0.037-1.265,0.409-1.599,1.041c-0.558,1.116-1.265,2.12-2.046,3.013c-0.707,0.818-1.302,1.339-2.008,1.897
                                c-0.632,0.558-1.376,1.153-2.231,2.083c-1.004,1.079-1.897,2.306-2.678,3.57l-4.91,0.744c-1.153,0.186-2.008,1.19-2.008,2.343
                                l0.111,8.741c0,1.264,1.079,2.306,2.343,2.306h6.844l11.679,2.455c0.446,0.111,0.93,0.148,1.376,0.148
                                c2.642,0,5.096-1.525,6.212-4.017c0.595-1.302,1.153-2.715,1.674-4.166c0.706-1.971,1.302-4.017,1.711-6.1
                                c0.148-0.781-0.037-1.6-0.483-2.232C312.691,317.776,311.948,317.367,311.166,317.292z M284.386,321.458l1.897-0.298l-0.297,8.555
                                h-1.525L284.386,321.458z M309.492,325.847c-0.521,1.376-1.041,2.715-1.6,3.98c-0.78,1.785-2.752,2.79-4.649,2.38l-11.939-2.492
                                h-2.678l0.297-8.926l1.414-0.224l0.297-0.558c0.707-1.302,1.6-2.529,2.604-3.645c0.744-0.818,1.339-1.302,2.009-1.86
                                c0.707-0.595,1.45-1.19,2.269-2.194c0.67-0.781,1.302-1.637,1.822-2.529c0.67,1.116,0.855,2.455,0.559,3.72l-2.604,5.133
                                l1.86,0.223c2.343,0.297,4.575,0.446,6.732,0.595c1.636,0.112,3.31,0.223,4.983,0.409c0.074,0,0.149,0.075,0.187,0.112
                                s0.074,0.111,0.037,0.186C310.72,322.091,310.199,324.025,309.492,325.847z' />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class='pmd-display2'>10</div>
                                    <div class='source-semibold typo-fill-secondary'>Improvements</div>
                                </li>
                                <li>
                                    <div class='statistic-img-circle'>
                                        <svg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
                                            width='33.083px' height='33.417px' viewBox='281.057 329.779 33.083 33.417' enable-background='new 281.057 329.779 33.083 33.417'
                                            xml:space='preserve'>
                                            <g>
                                                <path fill='#40AC45' stroke='#40AC45' stroke-miterlimit='10' d='M297.411,362.596c-3.613,0-7.03-1.171-9.884-3.387
                                c-2.978-2.313-5.058-5.622-5.859-9.318c-0.039-0.179-0.002-0.366,0.101-0.518c0.103-0.152,0.264-0.254,0.445-0.283l4.488-0.739
                                c0.344-0.064,0.677,0.163,0.759,0.504c0.548,2.295,1.818,4.269,3.672,5.708c1.81,1.406,3.977,2.149,6.268,2.149
                                c2.407,0,4.697-0.822,6.53-2.33l-2.996-2.325c-0.205-0.16-0.3-0.424-0.243-0.678c0.059-0.253,0.258-0.45,0.513-0.505l10.313-2.237
                                c0.194-0.041,0.396,0.004,0.551,0.125c0.156,0.122,0.251,0.306,0.259,0.504l0.38,10.411c0.014,0.05,0.019,0.103,0.019,0.157
                                c0,0.372-0.316,0.655-0.675,0.669c-0.139-0.002-0.296-0.046-0.418-0.141l-2.974-2.31
                                C305.671,360.949,301.607,362.596,297.411,362.596z M283.141,350.292c0.831,3.113,2.662,5.884,5.206,7.86
                                c2.617,2.032,5.751,3.106,9.064,3.106c4.035,0,7.938-1.66,10.706-4.557c0.237-0.247,0.623-0.275,0.894-0.066l2.312,1.795
                                l-0.305-8.315l-8.132,1.765l2.5,1.94c0.152,0.12,0.247,0.3,0.258,0.494s-0.065,0.383-0.205,0.517
                                c-2.168,2.076-5.023,3.22-8.04,3.22c-2.59,0-5.042-0.841-7.087-2.43c-1.904-1.479-3.305-3.539-3.992-5.852L283.141,350.292z'
                                                />
                                                <path fill='#40AC45' stroke='#40AC45' stroke-miterlimit='10' d='M308.492,346.124c-0.146,0-0.287-0.047-0.404-0.136
                                c-0.146-0.112-0.24-0.278-0.26-0.461c-0.303-2.805-1.687-5.295-3.896-7.01c-1.81-1.404-3.976-2.147-6.267-2.147
                                c-2.407,0-4.698,0.822-6.53,2.329l2.995,2.326c0.205,0.16,0.3,0.423,0.242,0.677c-0.058,0.252-0.257,0.45-0.511,0.505
                                l-10.313,2.237c-0.193,0.042-0.396-0.004-0.552-0.125c-0.156-0.122-0.25-0.306-0.258-0.504l-0.387-10.545
                                c-0.009-0.26,0.132-0.501,0.363-0.62c0.231-0.119,0.51-0.093,0.715,0.067l2.975,2.31c2.988-2.893,7.053-4.54,11.247-4.54
                                c3.613,0,7.03,1.171,9.885,3.387c3.409,2.647,5.579,6.47,6.109,10.763c0.044,0.356-0.201,0.683-0.555,0.742l-4.492,0.736
                                C308.565,346.121,308.53,346.124,308.492,346.124z M297.666,335.031c2.59,0,5.041,0.839,7.087,2.428
                                c2.313,1.797,3.827,4.341,4.31,7.224l3.165-0.519c-0.614-3.678-2.553-6.938-5.509-9.234c-2.618-2.031-5.752-3.105-9.065-3.105
                                c-4.034,0-7.936,1.66-10.706,4.557c-0.237,0.247-0.624,0.275-0.894,0.065l-2.311-1.794l0.304,8.315l8.131-1.764l-2.499-1.941
                                c-0.154-0.119-0.249-0.3-0.257-0.494c-0.01-0.194,0.064-0.383,0.205-0.518C291.795,336.174,294.65,335.031,297.666,335.031z'
                                                />
                                            </g>
                                        </svg>
                                    </div>
                                    <div class='pmd-display2'>2</div>
                                    <div class='source-semibold typo-fill-secondary'>Update done</div>
                                </li>
                            </ul>
                        </div>
                        <span class='btn-loader loader hidden'>Loading...</span>
                    </div>
                </div>
                <!-- end statistics-->
            </div>

            <!-- Table -->
            <div class='table-responsive pmd-card pmd-z-depth' style='margin-top:40px'>
                <table class='table pmd-table table-hover' width='100%'>
                    <thead>
                        <td>#</td>
                        <td width='65%'>Company</td>
                        <td class='text-center'>No of acc</td>
                        <td>Actions</td>
                    </thead>
                    <tbody>
                        <?php
                        for ($i=0; $i<count($companies); ++$i){
                            $company = $companies[$i];
                            $i1 = $i + 1;
                            echo "<tr>
                            <td class='text-center'>$i1</td>
                            <td>
                                <a role='button' data-toggle='collapse' href='#coll1' aria-expanded='false' aria-controls='coll1'>
                                    $company->companyName
                                </a>
                            </td>
                            <td class='text-center'>$company->numAccountsUsed/$company->numAccounts</td>
                            <td class='pmd-table-row-action'>
                                <a type='button' class='btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm' data-toggle='modal' data-target='#delete-modal' onClick='registerDelete(\"$company->companyName\")'>
                                    <i class='material-icons md-dark pmd-sm'>delete</i>
                                </a>
                            </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- end table -->
            </div>

        </div>
    </div>
    <!--content area end-->

    <!-- Footer Starts -->
    <footer class='footer admin-footer'>
        <div class='container'>
            <!-- Copyrights -->
            <div class='copyright pull-right'>
                <div class='site-info text-right'>
                    <span class='crafted'>
                        &copy;
                        <script>document.write(new Date().getFullYear())</script> , made with
                        <i class='material-icons pmd-xs'>favorite</i>
                        by F4nt4stic
                    </span>
                </div>
            </div>
            <!-- End Copyrights -->
        </div>
    </footer>
    <!-- Footer Ends -->


    <!-- delete modal -->
    <div id='delete-modal' class='modal fade ' tabindex='-1' role='dialog'>
        <div class='modal-dialog modal-md' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <div class='modal-title' id='myModalLabel'>Do you really want to delete this company?</div>
                </div>
                <!-- <div class='modal-body'>
                    Do you really want to delete this row?
                </div> -->
                <div class='modal-footer'>
                    <button class='btn btn-default' data-dismiss='modal'>No</button>
                    <button class='btn btn-success' data-dismiss='modal' onClick="sendRequestDelete()">Yes</button>                    
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts Starts -->
    <script src='<?php echo base_url() ?>assets/js/jquery-1.12.2.min.js'></script>
    <script src='<?php echo base_url() ?>assets/js/bootstrap.min.js'></script>
    <script src='<?php echo base_url() ?>assets/js/propeller.min.js'></script>
    <!-- Scripts Ends -->
</body>

</html>