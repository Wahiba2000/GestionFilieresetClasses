<?php
                                    include_once 'services/ClasseServices.php';
                                    include_once 'beans/Classe.php';
                                    include_once 'services/FiliereServices.php';

                                    $var1 = new ClasseServices();

                                    foreach( $var1->findAll() as $e1){
                                        
                                        $filiereid = $e1->getId_f();
                                        $filiereservice = new FiliereServices();
                                        $f = $filiereservice->findById($filiereid);
                                        
                                   

                                ?>
                                <tr>
                                    <th scope="row"><?php echo $e1->getId(); ?></th>
                                    <td name="codec"><?php echo $e1->getCode(); ?></td>
                                    <td name="filiere"><?php echo $f->getCode(); ?></td>
                                    <td><button type="button" name="<?php echo $e1->getId()?>" class="btn btn-danger"><a href="controller/deleteClasse.php?id=<?php echo $e1->getId()?>">Supprimer</a></button></td>
                                    <td><button type="button" name="<?php echo $e1->getId()?>" class="btn btn-secondary modifierclasse">Modifier</button></td>
                                </tr>
                                <?php  } ?>