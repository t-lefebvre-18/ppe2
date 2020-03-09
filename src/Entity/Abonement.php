<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbonementRepository")
 */
class Abonement
{
 /*private $db;
 private $insert;
 private $update;
 private $select;
 private $selectById;
 private $selectCount;
 private $selectLimit;
 private $delete;
   */ 
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

   
    /*
 public function __construct($db){
 $this->db = $db;
 $this->insert = $db->prepare("INSERT INTO livre (couverture,titre,idauteur,idediteur,datelivre,isbn,prix,iddisponibilite,idcollection,idgenre,idcoupdecoeur)
                               VALUES (:couverture,:titre,:idauteur,:idediteur,:datelivre,:isbn,:prix,:iddisponibilite,:idcollection,:idgenre,:idcoupdecoeur);");
 $this->update = $db->prepare("UPDATE  livre
                              SET  couverture=:couverture,titre=:titre,idauteur=:idauteur,idediteur=:idediteur,datelivre=:datelivre,isbn=:isbn,prix=:prix,
                                    iddisponibilite=:iddisponibilite,idcollection=:idcollection,idgenre=:idgenre,idcoupdecoeur=:idcoupdecoeur WHERE id=:id");
 $this->select = $db->prepare("SELECT * FROM livre l
  INNER JOIN auteur a ON l.idauteur = a.idauteur
  INNER JOIN editeur e ON l.idediteur = e.idediteur
  INNER JOIN genre g ON l.idgenre = g.idgenre
  INNER JOIN collection c ON l.idcollection = c.idcollection
  INNER JOIN disponibilite d ON l.iddisponibilite = d.iddisponibilite
  INNER JOIN coupdecoeur f ON l.idcoupdecoeur = f.idcoupdecoeur
  ORDER BY titre;");

$this->selectById = $db->prepare("SELECT * FROM livre WHERE id=:id;");
$this->selectCount =$db->prepare("SELECT count(*) AS nb FROM livre");
$this->selectLimit = $db->prepare("SELECT * from livre l
INNER JOIN auteur a ON l.idauteur = a.idauteur
INNER JOIN editeur e ON l.idediteur = e.idediteur
INNER JOIN genre g ON l.idgenre = g.idgenre
INNER JOIN collection c ON l.idcollection = c.idcollection
INNER JOIN disponibilite d ON l.iddisponibilite = d.iddisponibilite
INNER JOIN coupdecoeur f ON l.idcoupdecoeur = f.idcoupdecoeur
ORDER BY titre limit :inf,:limite");
  $this->delete = $db->prepare("DELETE FROM livre WHERE id=:id");

 }

 public function insert( $couverture,$titre,$idauteur,$idediteur,$datelivre,$isbn,$prix,$iddisponibilite,$idcollection,$idgenre,$idcoupdecoeur ){
  $r = true;
  $this->insert->execute(array(':couverture'=>$couverture,':titre'=>$titre,':idauteur'=>$idauteur,':idediteur'=>$idediteur,':datelivre'=>$datelivre,
                                ':isbn'=>$isbn,':prix'=>$prix,':iddisponibilite'=>$iddisponibilite,':idcollection'=>$idcollection,':idgenre'=>$idgenre,':idcoupdecoeur'=>$idcoupdecoeur));
  if ($this->insert->errorCode()!=0){
  print_r($this->insert->errorInfo());
  $r=false;
  }
  return $r;
  }
  public function select(){
 $liste = $this->select->execute();
 if ($this->select->errorCode()!=0){
 print_r($this->select->errorInfo());
 }
 return $this->select->fetchAll();
 }
 public function update($couverture,$titre,$idauteur,$idediteur,$datelivre,$isbn,$prix,$iddisponibilite,$idcollection,$idgenre,$idcoupdecoeur,$id){
     $r = true;
  $this->update->execute(array(':couverture'=>$couverture,':titre'=>$titre,':idauteur'=>$idauteur,':idediteur'=>$idediteur,':datelivre'=>$datelivre,':isbn'=>$isbn,':prix'=>$prix,':iddisponibilite'=>$iddisponibilite,':idcollection'=>$idcollection,':idgenre'=>$idgenre,':idcoupdecoeur'=>$idcoupdecoeur,':id'=>$id));
 if ($this->update->errorCode()!=0){
         print_r($this->update->errorInfo());
       $r=false;
     }
   return $r;
  }
 public function selectById($id){
 $this->selectById->execute(array(':id'=>$id));
 if ($this->selectById->errorCode()!=0){
 print_r($this->selectById->errorInfo());
 }
 return $this->selectById->fetch();
 }
 public function selectCount(){
   $this->selectCount->execute();
   if ($this->selectCount->errorCode()!=0){
     print_r($this->selectCount->errorInfo());
   }
   return $this->selectCount->fetch();
 }

 
public function selectLimit($inf, $limite){
  $this->selectLimit->bindParam(':inf', $inf, PDO::PARAM_INT);
  $this->selectLimit->bindParam(':limite', $limite, PDO::PARAM_INT);
  $this->selectLimit->execute();
  if ($this->selectLimit->errorCode()!=0){
    print_r($this->selectLimit->errorInfo());
  }
  return $this->selectLimit->fetchAll();
}
 public function delete($id){
 $r = true;
 $this->delete->execute(array(':id'=>$id));
 if ($this->delete->errorCode()!=0){
 print_r($this->delete->errorInfo());
 $r=false;
 }
 return $r;
 }
}
*/
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|modedepaiement[]
     */
    public function getAbonementId(): Collection
    {
        return $this->abonement_id;
    }

    public function addAbonementId(modedepaiement $abonementId): self
    {
        if (!$this->abonement_id->contains($abonementId)) {
            $this->abonement_id[] = $abonementId;
        }

        return $this;
    }

    public function removeAbonementId(modedepaiement $abonementId): self
    {
        if ($this->abonement_id->contains($abonementId)) {
            $this->abonement_id->removeElement($abonementId);
        }

        return $this;
    }

    /**
     * @return Collection|Modedepaiement[]
     */
    public function getModedepaiements(): Collection
    {
        return $this->modedepaiements;
    }

    public function addModedepaiement(Modedepaiement $modedepaiement): self
    {
        if (!$this->modedepaiements->contains($modedepaiement)) {
            $this->modedepaiements[] = $modedepaiement;
            $modedepaiement->addModedepaiementId($this);
        }

        return $this;
    }

    public function removeModedepaiement(Modedepaiement $modedepaiement): self
    {
        if ($this->modedepaiements->contains($modedepaiement)) {
            $this->modedepaiements->removeElement($modedepaiement);
            $modedepaiement->removeModedepaiementId($this);
        }

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
