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
    /// Data class to hold high-level Registration Data
    /// </summary>
class RegistrationData
{
    private $_registrationId;
    private $_courseId;
    private $_courseTitle;
	private $_data;
   // private int numberOfInstances;

    /// <summary>
    /// Constructor which takes an XML node as returned by the web service.
    /// </summary>
    /// <param name="regDataEl"></param>
    public function __construct($registrationDataElement)
    {
        $this->_registrationId = (string) $registrationDataElement['regid'];
        $this->_courseId = (string) $registrationDataElement['course'];
        $this->_courseTitle = (string) $registrationDataElement['courseTitle'];
    }

    /// <summary>
    /// Helper method which takes the full XmlDocument as returned from the registration listing
    /// web service and returns a List of RegistrationData objects.
    /// </summary>
    /// <param name="xmlDoc"></param>
    /// <returns></returns>
    public static function ConvertToRegistrationDataList($data)
    {		
        $allResults = array();

        if (false == $data['data']['status']) {
            return $allResults;
        }
        
        foreach ($data['data']['registrations'] as $registration)
        {
            
            $allResults[] = new RegistrationData($registration);
        }
        
        return $allResults;
    }

    /// <summary>
    /// Unique Identifier for this registration
    /// </summary>
    public function getRegistrationId()
    {
        return $this->_registrationId;
    }

    /// <summary>
    /// Unique Identifier for this course
    /// </summary>
    public function getCourseId()
    {
        return $this->_courseId;
    }

    public function getCourseTitle()
    {
        return $this->_courseTitle;
    }

	public function getData()
    {
        return $this->_data;
    } 
}

?>
