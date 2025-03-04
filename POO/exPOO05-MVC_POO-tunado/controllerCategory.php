<?php
session_start();

include "./utils/utils.php";
include "./view/viewCategory.php";
include "./model/modelCategory.php";
include "./genericController.php";



class ControllerCategory extends GenericController
{
  private ?ViewCategory $viewCategory;
  private ?ModelCategory $modelCategory;

  public function __construct(?ViewCategory $newViewCategory, ?ModelCategory $newModelCategory)
  {
    $this->viewCategory = $newViewCategory;
    $this->modelCategory = $newModelCategory;
  }

  public function getViewCategory(): ?ViewCategory
  {
    return $this->viewCategory;
  }

  public function setViewCategory(?ViewCategory $viewCategory): self
  {
    $this->viewCategory = $viewCategory;
    return $this;
  }

  public function getModelCategory(): ?ModelCategory
  {
    return $this->modelCategory;
  }

  public function setModelCategory(?ModelCategory $modelCategory): self
  {
    $this->modelCategory = $modelCategory;
    return $this;
  }

  //METHOD
  public function addCategory(): string
  {
    //btn submit
    if (isset($_POST['submit'])) {
      //variables not vides ou nulls
      if (isset($_POST['category']) && !empty($_POST['category'])) {
        $category = sanitize($_POST['category']);

        //verification de la categorie
        $this->getModelCategory()->setName($category);
        $data = $this->getModelCategory()->getByName();

        if (empty($data)) {
          $this->getModelCategory()->setName($category);
          $this->getViewCategory()->setMessage($this->getModelCategory()->add());
        } else {
          return "Cette catégorie existe déjà.";
        }
      } else {
        return "Veuillez remplir les champs obligatoires.";
      }
    }
    return '';
  }

  public function readCategories(): array | string
  {
    $categoryList = '';
    $data = $this->getModelCategory()->getAll();

    foreach ($data as $user) {
      $categoryList = $categoryList . "<li>Catégorie: {$user['name']}</li>";
    }
    return $categoryList;
  }

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    $this->getViewCategory()->setMessage($this->addCategory());
    $this->getViewCategory()->setCategoriesList($this->readCategories());
    echo $this->getViewCategory()->displayView();

    echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
  }
}

$category = new ControllerCategory(new ViewCategory(), new ModelCategory());
$category->render();