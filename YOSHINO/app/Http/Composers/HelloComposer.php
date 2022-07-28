<?php 
namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer 
{
    // Viewインスタンスを引数として持ってるメソッド
    // サービスプロバイダのbootからView::compsoerが実行された際に呼び出される
    public function compose(View $view) {
        $view->with('view_message', 'this view is "'.$view->getName().'"!!');
    }
}
?>