<?php
class Controller_Index extends Controller_Base
{
	public function before() 
	{
		parent::before();
	}

	public function action_index()
	{
        $data = Model_Base_Core::getOne('news_show', [
            'where' => ['id' => 1]
        ]);

        $dataText1 = $data['text1'];
        $dataText8 = $data['text8'];
        $codeAnalytic = $data['codeanalytics'];

        $this->theme->set_partial('header', 'partials/header')->set('dataText1', $dataText1);
        $this->theme->set_partial('footer', 'partials/footer')->set(['dataText8' => $dataText8, 'codeAnalytic' => $codeAnalytic]);
        $this->theme->get_template()->set('titlepage', $data['title_page'] . " | cairfogvn.com");
        $this->theme->get_template()->set('metadesc', $data['meta_desc']);
        $this->theme->get_template()->set('metakey', $data['meta_key']);
		$this->theme->get_template()->set('content', \view::forge('home/index', $data));
	}
}
