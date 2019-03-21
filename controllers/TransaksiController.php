<?php

namespace app\controllers;

use Yii;
use app\models\Transaksi;
use app\models\TransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DetailTransaksi;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transaksi models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TransaksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transaksi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Transaksi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Transaksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Transaksi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAddTransaksi() {
        $model_head = new Transaksi ();
        $model_detail = new DetailTransaksi();
        $screen = 1;

        if ($model_head->load(Yii::$app->request->post())) {
            $screen = 2;
            $model_detail->id_lokasi = $model_head->id_lokasi;
            if($screen == 2 && Yii::$app->request->post('DetailTransaksi', [])) {
                $datas = Yii::$app->request->post('DetailTransaksi', []);
                $tersimpan = true;
                $message= 'berhasil';
                $trans = \Yii::$app->db->beginTransaction();
                
                //menyimpan head 
                $model_head->user_id = Yii::$app->user->id;
                $tersimpan = $tersimpan && $model_head->save();
                
                if ($tersimpan){
                    //loopimg data input detail
                    foreach ($datas as $data){
                        //menyimpan detail transaksi
                        $detail = new DetailTransaksi;
                        $detail->id_transaksi = $model_head->id;
                        $detail->id_ruangan = $data['id_ruangan'];
                        $detail->id_barang = $data['id_barang'];
                       
                        $tersimpan = $tersimpan && $detail->save();
                        
                        if($tersimpan){
                            //ubah status barang
                           $barang = \app\models\Barang::findOne($detail->id_barang);
                           $barang->status = 'dialokasikan';
                           $tersimpan = $tersimpan && $barang->save();
                           
                           if(!$tersimpan){
                               $message = 'Gagal Update Barang';
                           }
                        }else{
                            $message = 'Gagal Menyimpan Detail';
                        }
                    }
                }else{
                    $message = 'gagal menyimpan head';
                }
                
                if($tersimpan){
                    $trans->commit();
                     return $this->redirect(['view', 'id' => $model_head->id]);
                }else{
                    $trans->rollBack();
                    \Yii::$app->session->setFlash('error',$message);
                }
            }
        }

        return $this->render('add', [
                "model_head" => $model_head,
                "model_detail" => $model_detail,
                "screen" => $screen
        ]);
    }
    
    public function actionReport(){
        $model = new Transaksi();
        $transaksi = null;
        if ($model->load(Yii::$app->request->post())){
            if($model->tgl_awal){
                $transaksiQuery = Transaksi::find();
                if($model->tgl_akhir){
                    if($model->tgl_akhir < $model->tgl_awal){
                        \Yii::$app->session->setFlash('error','Tanggal Akhir Harus Lebih Besar');
                    }
                    $transaksiQuery->where(['between','tgl_permintaan',$model->tgl_awal,$model->tgl_akhir]);                            
                }else{
                   $transaksiQuery->where(['tgl_permintaan'=>$model->tgl_awal]);
                }
                if($model->id_lokasi){
                    $transaksiQuery->andWhere(['id_lokasi'=>$model->id_lokasi]);
                }
                
                $transaksi = $transaksiQuery->orderBy('tgl_permintaan')->all();
                
                if(isset($_POST['print'])) {
                   return $this->render('print',[
                        'model'=> $model,
                         'transaksi'=>$transaksi
                     ]);
                }
            }else{
                \Yii::$app->session->setFlash('error','Tanggal Awal Harus Diisi');
            }
        }
        return $this->render('report',[
           'model'=> $model,
            'transaksi'=>$transaksi
        ]);
    }
    
    public function actionBon($id){
          return $this->render('bon', [
                    'model' => $this->findModel($id),
        ]);
        
    }

}
