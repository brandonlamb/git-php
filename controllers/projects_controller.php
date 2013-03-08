<?php

class ProjectsController extends AppController
{
	public function show()
	{
		$project = $this->_request->param('project');
		$branch = $this->_request->param('branch');
		$filepath = $this->_request->param('filepath');

		$this->_breadcrumbs = array(
			'home' => '/',
			$project => "/$project",
			$branch => "/$project/$branch",
		);

		if (!empty($filepath)) {
			$paths = explode('/', $filepath);
			$prevPath = "/$project/$branch";
			foreach ($paths as $i => $path) {
				$prevPath = $prevPath . '/' . $path;
				$this->_breadcrumbs[$path] = $prevPath;
			}
		}

		$tree = $this->Project->getTree(
			$project,
			$filepath
		);
		$this->set(compact('tree'));
	}

	public function blob()
	{
		$project = $this->_request->param('project');
		$branch = $this->_request->param('branch');
		$filepath = $this->_request->param('filepath');

		$this->_breadcrumbs = array(
			'home' => '/',
			$project => "/$project",
			$branch => "/$project/tree/$branch",
		);

		if (!empty($filepath)) {
			$paths = explode('/', $filepath);
			$prevPath = "/$project/$branch";
			foreach ($paths as $i => $path) {
				$prevPath = $prevPath . '/' . $path;
				$this->_breadcrumbs[$path] = $prevPath;
			}
		}

		$data = $this->Project->getBlob(
			$project,
			$filepath
		);
		$this->set(compact('data'));
	}
}
