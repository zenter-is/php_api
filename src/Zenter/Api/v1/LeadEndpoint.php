<?php

namespace Zenter\Api\v1
{
	class LeadEndpoint
	{
		private $restClient;

		public function __construct(IHttpClient $restClient)
		{
			$this->restClient = $restClient;
		}

		public function AddRecipient($recipientId, $originId, $topic)
		{
			$data = [
				'recipient_id' => $recipientId,
				'origin_id' => $originId,
				'topic' => $topic
			];

			$action = "/leads/add";
			$this->restClient->call($action, $data, 'POST');

			return $this->restClient->GetStatusCode() === 200;
		}
	}
}
