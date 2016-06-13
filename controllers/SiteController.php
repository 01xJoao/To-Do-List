<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\utilizadores;
use app\models\RegistarForm;
use app\models\Lista;
use app\models\Departamento;
use app\models\Tarefas;
use app\models\MostrarListas;
use app\models\TarefasLista;
use app\models\UtilizadoresSearch;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if(Yii::$app->user->id == 10){
            $searchModel = new UtilizadoresSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
              
            $provider = new \yii\data\ActiveDataProvider([
                'query' => Departamento::find(),
                'pagination' =>[
                'pageSize' => 5,
                ],
            ]);
            
            $model = new Departamento();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->save();
                    return $this->render('admin', [
                        'model' => $model,
                        'provider' => $provider,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                }
            }

            return $this->render('admin', [
                'model' => $model,
                'provider' => $provider,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
        if (!Yii::$app->user->isGuest) {
            $provider = new \yii\data\ActiveDataProvider([
                'query' => lista::find()->where(['id_utilizador' => Yii::$app->user->id]),
                'pagination' =>[
                    'pageSize' => 10,
                ],
            ]);
             return $this->render('menuprincipal',['provider' => $provider]);
        }
        else
            return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    
    //Cria Utilizadores
    public function actionRegistar()
    {
        $model = new RegistarForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) 
            {
            $model->save();
            return $this->goHome();
            }
        }
        return $this->render('registar', [
            'model' => $model,
        ]);
    }
    //Cria Listas
    public function actionListas()
    {
        $model = new Lista();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_utilizador = Yii::$app->user->id;
            if ($model->validate()) 
            {
                $model->save();
                return $this->goBack();
            }
        }
        else
        {
            return $this->render('listas', [
                'model' => $model,
            ]);
        }
    }
    //Cria Tarefas
    public function actionTarefas($id)
    {
        $model = new Tarefas();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                
                // Volta à lista pelo o id da guarado na tarefa
                $provider = new \yii\data\ActiveDataProvider([
                    'query' => Tarefas::find()->where(['id_lista' => $model->id_lista]),
                    'pagination' =>[
                        'pageSize' => 10,
                    ],
                ]);

                return $this->render('view',['model' => $this->findModelList($model->id_lista),
                                             'provider' => $provider]);
                
            }
        }
        $model->id_lista = $id;    
        return $this->render('tarefas', [
            'model' => $model,
        ]);
    }
    
    public function actionMenuprincipal()
    {
        $provider = new \yii\data\ActiveDataProvider([
            'query' => lista::find()->where(['id_utilizador' => Yii::$app->user->id]),
            'pagination' =>[
                'pageSize' => 10,
            ],
        ]);
         return $this->render('menuprincipal',['provider' => $provider]);
    }
    
    public function actionDelete($id)
    {
        $this->findModelList($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModelList($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']); 
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionView($id)
    {
        $provider = new \yii\data\ActiveDataProvider([
            'query' => Tarefas::find()->where(['id_lista' => $id]),
            'pagination' =>[
            'pageSize' => 10,
            ],
        ]);
            
        return $this->render('view',['model' => $this->findModelList($id),
                                     'provider' => $provider]);
    }

    protected function findModelList($id)
    {
        if (($model = Lista::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionApagartarefa($id,$idd)
    {
        $this->findModelTarefa($id)->delete();
        $this->redirect(array('view', 'id' => $idd));
    }
    
    protected function findModelTarefa($id)
    {
        if (($model = Tarefas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionCancelarcoisas()
    {
        return $this->goBack();
    }
}