<div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Les Utilisateurs</h3>
                               
                            </div>


                                            
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Prenom</th>
                                            <th class="border-top-0">email</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) :?>
                                        <tr>
                                            <td><?= $user->id_user; ?></td>
                                            <td class="txt-oflo"><?= $user->Fname; ?></td>
                                            <td class="txt-oflo"><?= $user->Lname; ?></td>
                                            <td class="txt-oflo"><?= $user->email; ?></td>
                                           
                                            
                                            
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
