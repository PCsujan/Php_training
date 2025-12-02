<h2>New Contact Inquiry</h2>

<p><strong>Name:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Phone:</strong> {{ $contact->phone_number }}</p>
<p><strong>Request Type:</strong> {{ ucfirst($contact->request) }}</p>
<p><strong>Message:</strong></p>
<p>{{ $contact->message }}</p>
