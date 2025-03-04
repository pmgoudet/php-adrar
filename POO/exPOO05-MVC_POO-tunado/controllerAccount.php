<?php

include "./utils/utils.php";
include "./model/modelUser.php";
include "./view/viewAccount.php";
include "./genericController.php";


session_start();

class ControllerAccount extends GenericController
{
  private ?ViewAccount $viewAccount;

  public function __construct(?ViewAccount $newViewAccount)
  {
    $this->viewAccount = $newViewAccount;
  }

  public function getViewAccount(): ?ViewAccount
  {
    return $this->viewAccount;
  }

  public function setViewAccount(?ViewAccount $viewAccount): self
  {
    $this->viewAccount = $viewAccount;
    return $this;
  }

  //METHOD

  public function render(): void
  {
    echo $this->setViewHeader(new ViewHeader)->getViewHeader()->displayView();

    echo $this->getViewAccount()->displayView();

    echo $this->setViewFooter(new ViewFooter)->getViewFooter()->displayView();
  }
}

$account = new ControllerAccount(new ViewAccount);
$account->render();