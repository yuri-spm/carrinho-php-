<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/jaguar66/pen/QNJEjB?depth=everything&order=popularity&page=34&q=shop&show_forks=false" />

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'><link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
<style class="cp-pen-styles">table thead tr th {
  color: #B87333;
}

span.text-center {
  display: block;
  margin-bottom: 10px;
  color: red;
}

button {
  font-size: 13px!important;
}
button i {
  font-size: 15px!important;
}</style></head><body>
<div class="container" ng-app="myApp" ng-controller="myCtrl">
  
  <div class="col-md-6">
    <h2>Produtos</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>VALOR</th>
          <th>ADICIONAR</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="item in items">
          <td>{{ item.id }}</td>
          <td>{{ item.name }}</td>
          <td>$ {{ item.price | number:0 }}</td>
          <td>
            <button ng-click="addItem(item)" class="btn btn-sm btn-info">
              Add to cart
              <i class="fa fa-shopping-cart"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  
  <div class="col-md-6">
    <h2>CARRINHO</h2>
    <table class="table table-hover">
      <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>VALOR</th>
        <th>QUANTIDADE</th>
      </thead>
      <tbody id="ok">
        <tr ng-repeat="myItem in myItems | reverse">
          <td>{{ myItem.id }}</td>
          <td>{{ myItem.name }}</td>
          <td>$ {{ myItem.price }}</td>
          <td>{{ myItem.count }}</td>
        </tr>
      </tbody>
    </table>
    <span class="text-center" ng-show="myItems.length == 0">
      Seu carrinho esta vazio.
    </span>
    <div class="clearfix"></div>
    <span class="pull-right alert alert-success">Total Price: $ {{ !totalPrice ? "0" : totalPrice | number:0 }}</span>
    <button ng-click="removeBasket()" ng-show="myItems.length > 0" class="pull-left alert alert-danger">Empty your cart</button>
  </div>
  
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script><script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>
<script >var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope) {
  
  //ürünler - products
  $scope.items = [
    {
      id: 1,
      name: 'iPhone 6s',
      price: 2500
    },
    {
      id: 2,
      name: 'television',
      price: 8950
    },
    {
      id: 3,
      name: 'Macbook Pro',
      price: 4000
    },
    {
      id: 4,
      name: 'T-shirt',
      price: 20
    },
    {
      id: 5,
      name: 'C# Book',
      price: 10
    },
    {
      id: 6,
      name: 'Notebook',
      price: 6980
    }
  ];
  
  //sepetim - my shopping cart
  $scope.myItems = [];
  //sepete ekle - add to cart
  $scope.addItem = function(newItem) {
    if($scope.myItems.length == 0) {
      newItem.count = 1;
      $scope.myItems.push(newItem);
    }else {
      var repeat = false;
      for( var i = 0; i < $scope.myItems.length; i++ ) {if (window.CP.shouldStopExecution(1)){break;}
        if($scope.myItems[i].id == newItem.id) {
          $scope.myItems[i].count++;
          repeat = true;
        }
      }
window.CP.exitedLoop(1);

      if(!repeat) {
        newItem.count = 1;
        $scope.myItems.push(newItem);
      }
    }
    updatePrice();
  };
  
  //fiyatı güncelle (totalPrice) - update price
  var updatePrice = function() {
    var totalPrice = 0;
    for( var i = 0; i < $scope.myItems.length; i++ ) {if (window.CP.shouldStopExecution(2)){break;}
      totalPrice += ($scope.myItems[i].count) * ($scope.myItems[i].price);
    }
window.CP.exitedLoop(2);

    $scope.totalPrice = totalPrice;
  };
  
  //sepeti boşalt - empty your cart
  $scope.removeBasket = function() {
    $scope.myItems.splice(0, $scope.myItems.length);
    updatePrice();
  };
  
});

app.filter('reverse', function() {
  return function(items) {
    var x = items.slice().reverse();
    if( items.length > 1 ) {
      angular.element('#ok tr').css('background','#fff');
      angular.element('#ok tr').filter(':first').css('background','lightyellow');
      setTimeout(function() {
        angular.element('#ok tr') .filter(':first').css('background','#fff');
      }, 500);
    }
    return x;
  };
});

//# sourceURL=pen.js
</script>
</body></html>