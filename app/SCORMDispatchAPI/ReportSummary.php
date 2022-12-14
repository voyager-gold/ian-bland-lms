<?php

namespace App\SCORMDispatchAPI;

/* Software License Agreement (BSD License)
 * 
 * Copyright (c) 2010-2011, Rustici Software, LLC
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the <organization> nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL Rustici Software, LLC BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */


 /// <summary>
    /// Data class to hold high-level Registration Summary
    /// </summary>
class ReportSummary
    {
		private $_complete = 'unknown';
        private $_success = 'unknown';
        private $_totalTime = '0s';
        private $_score = 'unknown';

		/// <summary>
        /// Inflate RegistrationSummary info object from passed in xml element
        /// </summary>
        /// <param name="launchInfoElem"></param>
        public function __construct($data)
        {

            if (false == $data['data']['status']) {
                return false;
            }         
            
            foreach ($data['data']['reports'] as $report)
            {
                $this->_complete = $report['complete_status'];
                $this->_success = $report['satisfied_status'];
                $this->_totalTime = $report['total_time'];
                $this->_score = $report['score'];            
            }
        }

		/// <summary>
        /// The completion status of the Registration Summary
        /// </summary>
        public function getComplete()
        {
            return $this->_complete;
        }

        /// <summary>
        /// The success status of the Registration Summary
        /// </summary>
        public function getSuccess()
        {
			return $this->_success;
        }

        /// <summary>
        /// The total time of the Registration Summary
        /// </summary>
        public function getTotalTime()
        {
            return $this->_totalTime;
        }

        /// <summary>
        /// The score of the Registration Summary
        /// </summary>
        public function getScore()
        {
           return $this->_score;
        }

}

?>
