<h3 class='title-5 m-b-35'>Post Data</h3>
                                <div class='table-data__tool'>
                                    <div class='table-data__tool-right'>
                                        <a href='./?page=post_admin'><button class='au-btn au-btn-icon au-btn--green au-btn--small'>
                                            <i class='zmdi zmdi-plus'></i>Input new post</button>  </a>                                      
                                    </div>
                                </div>
                                <div class='table-responsive m-b-40'>
                                    <table class='table table-data3'>
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>author</th>
                                                <th>post</th>
                                                <th>member/s</th>
                                                <th>Deskripsi</th>
                                                <th>date created</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
								$query="SELECT * FROM post";
								$result = mysqli_query($konek, $query);
								while ($row = mysqli_fetch_array($result)){
									?>
                                            <tr>
                                                <td><?php
                                                echo"<p>".$row['id_post']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['id_user']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['judul']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['member']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['deskripsi']."</p>"
												?></td>
                                                <td><?php
                                                echo"<p>".$row['tanggal']."</p>"
												?></td>
                                                <td><div class='table-data-feature'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <i class='zmdi zmdi-edit'></i>
                                                        </button>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <i class='zmdi zmdi-delete'></i>
                                                        </button>
                                                    </div></td>

                                            </tr>
											<?php 
								}
								?>
                                        </tbody>
                                    </table>
                                </div>
								