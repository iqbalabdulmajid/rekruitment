<!-- menu sidebar-->
<div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav" style="margin-left:0;">
                    <li class="sidebar">
                            <a href="#menu-toggle"  id="menu-toggle"> <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i>  &nbsp; <?php echo $data['username']; ?> </a>
                    </li>
                    <li>
                        <a target="iframe_a" style="color: white;"><i class="fa fa-home" aria-hidden="true"></i>
                            <span style="margin-left:10px;">Profile</span>  </a>
                        <ul style="color: white; list-style-type: none; margin-left: 10px;">
                          <li><a target="iframe_a" href="lihat_head_office.php?id_head_office=<?php echo"$id_head_office"; ?>">Lihat Profile</a></li>
                          <li><a target="iframe_a" href="up_head_office.php?id_head_office=<?php echo"$id_head_office"; ?>">Update Profile</a></li>
                          <li><a target="iframe_a" href="pass.php?id_head_office=<?php echo"$id_head_office"; ?>">Ganti Password</a></li>
                        </ul>
                    </li>

                    <li>
                        <a target="iframe_a" style="color: white;"><i class="fa fa-briefcase" aria-hidden="true"></i> <span style="margin-left:10px;">HrMista</span>  </a>
                        <ul style="color: white; list-style-type: none; margin-left: 10px;">
                          <li><a target="iframe_a" href="e-contract.php">E-contract</a></li>
                        </ul>
                    </li>
            </div>
<!-- end menu sidebar -->