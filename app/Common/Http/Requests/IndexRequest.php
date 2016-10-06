<?php

namespace Balbi\MyMtg\Common\Http\Requests;

class IndexRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [];
	}

	public function perPage() {
		return $this->get('per_page', 15);
	}
    
    public function paginate() {
        return $this->has('paginate');
    }
}
