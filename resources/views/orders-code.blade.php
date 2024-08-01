
@extends('layouts.base')

@section('title', 'Fripsakyetna')

@section('content')
if(!isset($_SESSION['productItems']))
{
    $_SESSION['productItems'] = [];
}
if(!isset($_SESSION['productItemIds']))
{
    $_SESSION['productItemIds'] = [];
}



if(isset($_POST['addItem']))
{
    $productId=validate($_POST['product-id']);
    $prix=validate($_POST['data-prix']);
    $checkProduct=mysqli_query($conn,"SELECT * FROM produits WHERE id='$productId' LIMIT 1");
    if($checkProduct){
        if(mysqli_num_rows($checkProduct)>0)
        {
            $row=mysqli_fetch_assoc($checkProduct);
            if()
            {

            }
            $productData = [
                'product_id' => $row['id'],
                'name' => $row['name'],
                'image1' => $row['image1'],
                'prix' => $row['prix'],
                'taille' => $row['taille'],
                'Catégorie' => $row['Catégorie'],
                



                ];
                if(!in_array($row['id'],$_SESSION['productItemIds']))
                {

                array_push($_SESSION['productItemIds'],$row['id'])
                array_push($_SESSION['productItems',$productData])


                }else{
                    foreach($_SESSION['productItems',$productData] as $key => $prodSessionItem)
                    {   
                        $productData = [
                            'product_id' => $row['id'],
                            'name' => $row['name'],
                            'image1' => $row['image1'],
                            'prix' => $row['prix'],
                            'taille' => $row['taille'],
                            'Catégorie' => $row['Catégorie'],
                        ];
                        $_SESSION['productItems'][$key]  = $$productData;
                    }

                }
                redirect('panier.blade.php','Item Added !'.$row['name']);

 
        }else 
        {
            redirect('panier.blade.php','No such product found !');

        }

    }
    redirect('panier.blade.php','Something Went Wrong !');
}




@endsection
