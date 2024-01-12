<div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Les WIKI ARCHIVE</h3>
                               
                            </div>


                                          
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Titre</th>
                                            <th class="border-top-0">auteur</th>
                                            <th class="border-top-0">Date</th>

                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($wikis as $wiki) :?>
                                        <tr>
                                            <td><?= $wiki->id; ?></td>
                                            <td class="txt-oflo"><?= $wiki->title; ?></td>
                                            <td class="txt-oflo"><?php echo $wiki->Fname." ".$wiki->Lname; ?></td>
                                            <td class="txt-oflo"><?= $wiki->date; ?></td>
                                            <td>
                                                
                                                <a href="nonArchive?id=<?= $wiki->id;?>" ><i class="fa-solid fa-arrow-up-from-bracket" style="color: #5382d5;"></i></a>
                                            </td>
                                            </td>
                                            
                                        </tr>


                                             
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
